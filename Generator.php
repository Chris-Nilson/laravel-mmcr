<?php

namespace App\Generator;
require_once("Database.php");
require_once("migrations_genrator.php");
require_once("controllers_generator.php");
require_once("models_generator.php");
require_once("routes_generator.php");
require_once("detailed_routes_generator.php");
require_once("KeyConstraintGenerator.php");
require_once("singular_noun.php");
require_once("plurial_noun.php");
use App\MySQLDatabase;
use KeyConstraintGenerator;
use ZipArchive;

use function App\controllers_generator;
use function App\db_query;
use function App\migrations_genrator;
use function App\models_generator;
use function App\plurial_noun;
use function App\singular_noun;

interface Generator {
    public function generate_code();
}

class MySLQGenerator implements Generator
{
    private $tables_list;
    private $tables_desc;
    private $tables_code;
    private $driver_cursor;
    private $known_types;
    private $tables_and_fields;

    public function __construct() {
        $this->tables_desc = array();
        $this->tables_code = array();
        $this->tables_and_they_fields = array();

        $this->driver_cursor = new MySQLDatabase();
        $sql = "SHOW TABLES";
        $res = db_query($this->driver_cursor, $sql);
        $this->tables_list = $res['data'];

        if(empty($this->tables_list)) {
            exit("Empty database\n\n");
        }
        
        foreach ($this->tables_list as $table_name) {
            if($table_name == 'migrations')
                continue;
            $sql = "DESC $table_name";
            $res = db_query($this->driver_cursor, $sql);
            $this->tables_desc[$table_name] = $res['data'];
            $this->tables_and_fields[$table_name] = [];

        }

        foreach ($this->tables_desc as $key => $fields) {
            foreach ($fields as $_key => $value) {
                $this->tables_and_fields[$key][] = $value['Field'];
            }
        }

        // defining known types
        $this->known_types = array(
            'INT'                 => ['unsignedInteger', 'integer', 'increments'],
            'VARCHAR'             => ['string'],
            'TINYINT'             => ['unsignedTinyInteger', 'tinyInteger', 'tinyIncrements'],
            'SMALLINT'            => ['unsignedSmallInteger', 'smallInteger', 'smallIncrements'],
            'MEDIUMINT'           => ['unsignedMediumInteger', 'mediumInteger', 'mediumIncrements'],
            'BIGINT'              => ['unsignedBigInteger', 'bigInteger', 'bigIncrements'],
            'DECIMAL'             => ['unsignedDecimal', 'decimal'],
            'FLOAT'               => ['float'],
            'DOUBLE'              => ['double'],
            'REAL'                => ['double'],
            'BIT'                 => ['binary'],
            'BOOLEAN'             => ['boolean'],
            'SERIAL'              => ['string'],
            'DATE'                => ['date'],
            'DATETIME'            => ['dateTime', 'dateTimeTz'],
            'TIMESTAMP'           => ['timestamp', 'timestampTz'],
            'TIME'                => ['time', 'timeTz'],
            'YEAR'                => ['year'],
            'CHAR'                => ['char'],
            'TINYTEXT'            => ['string'],
            'TEXT'                => ['text'],
            'MEDIUMTEXT'          => ['mediumText'],
            'LONGTEXT'            => ['longText', 'json'],
            'BINARY'              => ['binary'],
            'VARBINARY'           => ['binary'],
            'TINYBLOB'            => ['binary'],
            'MEDIUMBLOB'          => ['binary'],
            'BLOB'                => ['binary'],
            'LONGBLOB'            => ['binary'],
            'ENUM'                => ['enum'],
            'SET'                 => ['set'],
            'GEOMETRY'            => ['geometry'],
            'POINT'               => ['point'],
            'LINESTRING'          => ['lineString'],
            'POLYGON'             => ['polygon'],
            'MULTIPOINT'          => ['multiPoint'],
            'MULTILINESTRING'     => ['multiLineString'],
            'MULTIPOLYGON'        => ['multiPolygon'],
            'GEOMETRYCOLLECTION'  => ['geometryCollection']
        );
    }

    private static function delTree($dir) {
        $files = array_diff(scandir($dir), array('.','..'));
         foreach ($files as $file) {
           (is_dir("$dir/$file")) ? self::delTree("$dir/$file") : unlink("$dir/$file");
         }
         return rmdir($dir);
    }

    public function generate_code() {
        $constraintGenerator = new KeyConstraintGenerator($this->tables_and_fields);

        foreach ($this->tables_desc as $table_name => $table_desc) {
            $this->tables_code[$table_name] = '';
            foreach ($table_desc as $value) {
                if (in_array(strtolower($value['Field']), ['created_at', 'updated_at'])) {
                    continue;
                }

                $field      = $value["Field"]; // Field
                $type       = $value["Type"]; // Type
                $null       = $value["Null"]; // Null
                $key        = $value["Key"]; // Key
                $default    = $value["Default"];// Default
                $extra      = $value["Extra"]; // Extra

                $result = preg_match("/[a-zA-Z]*/", $type, $match_type);
                $result = preg_match("/[0-9][0-9]*/", $type, $match_size);
                $is_auto_increment = preg_match("/auto_increment/", $extra, $match_extra);

                // echo $extra."\n";
                // exit();

                // type
                $match_type = strtoupper($match_type[0]);
                $final_type = $this->known_types[$match_type][0];

                if ($is_auto_increment) {
                    $final_type = $this->known_types[ strtoupper($match_type) ][2];
                }
                
                // case type is enum
                if (strtolower($match_type) == 'enum') {
                    $result = preg_match("/\(.*\)/", $type, $match_values);
                    $match_values = $match_values[0];
                    $match_values = str_replace('(', '[', $match_values);
                    $match_values = str_replace(')', ']', $match_values);

                    $final_type = $final_type;

                    // init table code
                    $this->tables_code[$table_name] .= "\n\t\t\t\$table->{$final_type}('$field', $match_values)";
                } else {
                    // init table code
                    $this->tables_code[$table_name] .= "\n\t\t\t\$table->{$final_type}('$field')";
                }

                // is nullable
                if (strtoupper($null) == "YES") {
                    $this->tables_code[$table_name] .= "->nullable()";
                }

                // // is unique
                // if (in_array(strtoupper($key), ["PRI", "UNI"])) {
                //     $this->tables_code[$table_name] .= "->unique()";
                // }

                // is unique
                if (strtoupper($key) =="UNI") {
                    $this->tables_code[$table_name] .= "->unique()";
                }

                // has default
                if (strtoupper($default) != null) {
                    $this->tables_code[$table_name] .= "->default('$default')";
                }

                $this->tables_code[$table_name].= ";";
            } // foreach
        } // foreach

        $app_dir = "./laravel_project/app";
        $migrations_dir = "./laravel_project/database/migrations";
        $controllers_dir = "./laravel_project/app/Http/Controllers";

        if(is_dir($app_dir)) {
            self::delTree($app_dir);
            self::delTree($migrations_dir);
        }

        if(!is_dir($app_dir)) {
            if(!mkdir($app_dir, 0777, true)) {
                exit("Error creating ./laravel_project/app");
            }
        }
        if(!is_dir($migrations_dir)) {
            if(!mkdir($migrations_dir, 0777, true)) {
                exit("Error creating ./laravel_project/app/migrations");
            }
        }
        if(!is_dir($controllers_dir)) {
            if(!mkdir($controllers_dir, 0777, true)) {
                exit("Error creating ./laravel_project/app/controllers");
            }
        }

        // command migrations - controller - models code
        // migration
        foreach ($this->tables_code as $table_name => $code) {
            $migration_file_name = date('Y_m_d_').time().'_create_'.$table_name.'_table.php';
            $file_path = $migrations_dir.'/'.$migration_file_name;
            if ($file_stream = fopen($file_path, 'w')) {
                $full_code = migrations_genrator($table_name, $code, $this->tables_and_fields);
                if (fwrite($file_stream, $full_code)) {
                    echo "\033[0;32mmigration::\033[m $migration_file_name\n";
                }
                chmod($file_path, 0777);
                fclose($file_stream);
            } else {
                echo "Cannot open $migration_file_name <br>";
            }
            $constraintGenerator->addfor($table_name);

        // model 
            $class_name = str_replace('_', ' ', $table_name);
            $class_name = ucwords($class_name);
            $class_name = str_replace(' ', '', $class_name);

            // $model_class_name = str_split($class_name);
            // if (strtolower($model_class_name[count($model_class_name)-1]) == 's') {
            //     $model_class_name[count($model_class_name)-1] = '';
            // }
            // $model_class_name = implode('', $model_class_name);
            $model_class_name = singular_noun($class_name);

            $model_file_name = $model_class_name.'.php';
            $file_path = $app_dir.'/'.$model_file_name;
            if ($file_stream = fopen($file_path, 'w')) {
                $full_code = models_generator($table_name, $this->tables_and_fields);
                if (fwrite($file_stream, $full_code)) {
                    echo "\033[0;35mmodel::\033[m $model_file_name\n";
                }
                chmod($file_path, 0777);
                fclose($file_stream);
            } else {
                echo "Cannot open $model_file_name <br>";
            }

        // controllers
            $controller_file_name = $class_name.'Controller.php';
            $file_path = $controllers_dir.'/'.$controller_file_name;
            if ($file_stream = fopen($file_path, 'w')) {
                $full_code = controllers_generator($table_name, $this->tables_and_fields);
                if (fwrite($file_stream, $full_code)) {
                    echo "\033[0;34mcontroller::\033[m $controller_file_name\n";
                }
                chmod($file_path, 0777);
                fclose($file_stream);
            } else {
                echo "Cannot open $controller_file_name <br>";
            }
            sleep(1);
            echo "\n";
        }
        $constraintGenerator->save();

        echo "\n";

        routes_generator($this->tables_and_fields);
        detailed_routes_generator($this->tables_and_fields);
        
        echo "\033[0;30m\033[45mSome todos comments might be auto generated for you\033[m\n";
        echo "\033[41mYou must take a look to the auto generated todos to fix not well generated code\033[m\n";
        echo "\033[41m(table fields types, table relationships, ...)\033[m\n";
    }
}

?>

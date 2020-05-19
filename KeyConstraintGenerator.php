<?php

use function App\plurial_noun;

class KeyConstraintGenerator {
    private $tables_and_fields;
    private $foreign_key_constraint_code;
    private $migrations_dir;
    private $probablyConstraints;

    public function __construct($tables_and_fields) {
        $this->tables_and_fields = $tables_and_fields;
        $this->foreign_key_constraint_code = '';
        $this->probablyConstraints = '';
        $this->migrations_dir = "./laravel_project/database/migrations";

        $this->foreign_key_constraint_code .= "
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeyConstraintsOnTables extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        ";
    }

public function addfor($table_name) {
    $this->foreign_key_constraint_code .= "\n\t\tSchema::table('{$table_name}', function (Blueprint \$table) {";
    $constraint_code = '';

    foreach ($this->tables_and_fields[$table_name] as $field) {
        $has_relation = preg_match('/_id$/', $field);
        if($has_relation) {
            $target_table_name = str_replace('_id', '', $field);
            $target_table_name = plurial_noun($target_table_name);
            // $target_table_if_has_a = $target_table_name;
            // $endChar = str_split($target_table_name);
            // $endChar = $endChar[count($endChar)-1];

            // $target_table_name = $target_table_name.'s';
            // if(in_array($target_table_name, array_keys($this->tables_and_fields)) OR
            //     in_array($endChar, ['a']) ) {
            //         if (in_array($endChar, ['a'])) {
            //             $target_table_name = $target_table_if_has_a;
            //         }
            if(in_array($target_table_name, array_keys($this->tables_and_fields))) {
                $constraint_code .= "

        \$table->foreign('$field')
            ->references('id')->on('{$target_table_name}')
            ->onDelete('cascade');
            ";
            } else {
                $this->probablyConstraints .= "
        // TODO change reference table FOO to correct table
        Schema::table('{$table_name}', function (Blueprint \$table) {
            
        \$table->foreign('$field')
            ->references('id')->on('FOO')
            ->onDelete('cascade');
        \n\t\t});\n
                ";
            }

        }
    }
    if(empty($constraint_code)) {
        $this->foreign_key_constraint_code .= "\n\t\t\t// code";
    }
    $this->foreign_key_constraint_code .= $constraint_code;
    $this->foreign_key_constraint_code .= "\n\t\t});\n";
}

public function save() {
    $this->foreign_key_constraint_code .= "
    {$this->probablyConstraints}
    ";
    $this->foreign_key_constraint_code .= "\n\t}\n}";
    $migration_file_name = date('Y_m_d_').time().'_create_key_constraints_on_tables.php';
    $file_path = $this->migrations_dir.'/'.$migration_file_name;

    if ($file_stream = fopen($file_path, 'a')) {
        if (fwrite($file_stream, $this->foreign_key_constraint_code)) {
            echo "\033[0;32mmigration::\033[m $migration_file_name\n";
        }
        chmod($file_path, 0777);
        fclose($file_stream);
    } else {
        echo "Cannot open $migration_file_name <br>";
    }
}
}
?>
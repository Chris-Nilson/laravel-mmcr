<?php

namespace App;

function models_generator($table_name, $table_and_fields = []) {
    // CreateClientsTable
    $class_name = str_replace('_', ' ', $table_name);
    $class_name = ucwords($class_name);
    $class_name = str_replace(' ', '', $class_name);

    // $class_name = str_split($class_name);
    // if(strtolower($class_name[count($class_name)-1]) == 's') {
    //     $class_name[count($class_name)-1] = '';
    // }
    // $class_name = implode('',$class_name);

    $class_name = singular_noun($class_name);

    // when key is migrated
    $relationship_code = '';

    $embeded_with = '';

    foreach ($table_and_fields[$table_name] as $field) {
        $has_relation = preg_match('/_id$/', $field);
        if($has_relation) {
            $function_name = str_replace('_id', '', $field);
            $target_class_name = str_split($function_name);

            // check end character to detect 'a'
            $endChar = $target_class_name[count($target_class_name)-1];

            $target_class_name[0] = strtoupper($target_class_name[0]);
            $target_class_name = implode('', $target_class_name);
            $target_class_name = str_replace('_', ' ', $target_class_name);
            $target_class_name = ucwords($target_class_name);
            $target_class_name = str_replace(' ', '', $target_class_name);
            $todo = '';

            // $with = [...]
            // $embeded_with .= "'$function_name', ";


            if( !in_array($function_name.'s', array_keys($table_and_fields)) AND
                !in_array($endChar, ['a']) ) {
                $todo .= "// TODO change App\\$target_class_name class to another existing class\n\t\t";
                $todo .= "// TODO create the inverse relationship method in the correct model class\n\t\t";
                $todo .= "// TODO add '_{$table_name}' in the eloquent of the correct class in its controller\n\t\t";
                $todo .= "// TODO copy the code in comment to the correct class and change '_{$table_name}' function name\n";
                $todo .= "\t\t/*
        public function _{$table_name}() {
            return \$this->hasOne('App\\{$class_name}', '$field');
            // return \$this->hasMany('App\\{$class_name}', '$field');
        }
        */";
    }

                $relationship_code .= "
    public function $function_name() {
        $todo
        return \$this->belongsTo('App\\{$target_class_name}', '$field');
        // return \$this->belongsToMany('App\\{$target_class_name}', '$field');
    }
            ";

        }
    }

    // reverse
    // $relation_table_name = str_split($table_name);
    // if(strtolower($relation_table_name[count($relation_table_name)-1]) == 's') {
    //     $relation_table_name[count($relation_table_name)-1] = '';
    // }

    $relation_table_name = singular_noun($table_name).'_id';
    // $relation_table_name = implode('',$relation_table_name).'_id';
    foreach ($table_and_fields as $table => $fields) {
        if(in_array($relation_table_name, $fields)) {
            $function_name = $table;

            $target_class_name = str_split($table);
            if(strtolower($target_class_name[count($target_class_name)-1]) == 's') {
                $target_class_name[count($target_class_name)-1] = '';
            }

            $target_class_name = implode('',$target_class_name);
            $target_class_name = str_split($target_class_name);
            $target_class_name[0] = strtoupper($target_class_name[0]);
            $target_class_name = implode('', $target_class_name);
            $target_class_name = str_replace('_', ' ', $target_class_name);
            $target_class_name = ucwords($target_class_name);
            $target_class_name = str_replace(' ', '', $target_class_name);
            // TODO add $relation_table_name is not necessary
            $relationship_code .= "
    public function $function_name() {
        return \$this->hasOne('App\\{$target_class_name}', '$relation_table_name');
        // return \$this->hasMany('App\\{$target_class_name}', '$relation_table_name');
    }
            ";
        }
    }

    // TODO work on the reverse to find if this table is sollicitated in other tables

    if(empty($relationship_code)) {
        $relationship_code .= "
    // public function foo() {
    //     // return \$this->belongsTo('App\bar');
    //     // return \$this->belongsToMany('App\bar');
    //     // return \$this->hasOne('App\bar');
    //     // return \$this->hasMany('App\bar');
    // }
            ";
    }


    return <<<EOT
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class $class_name extends Model
{
    protected \$guarded = ['id'];

    protected \$with = [];

    $relationship_code
}
EOT;
}

?>

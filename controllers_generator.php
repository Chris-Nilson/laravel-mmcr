<?php

namespace App;

function controllers_generator($table_name, $table_and_fields = []) {
    $class_name = str_replace('_', ' ', $table_name);
    $class_name = ucwords($class_name);
    $class_name = str_replace(' ', '', $class_name);

    // $model_class_name = str_split($class_name);
    // if(strtolower($model_class_name[count($model_class_name)-1]) == 's') {
    //     $model_class_name[count($model_class_name)-1] = '';
    // }
    // $model_class_name = implode('',$model_class_name);

    $model_class_name = singular_noun($class_name);

    $generic_variable_name = $model_class_name;
    $generic_variable_name[0] = strtolower($model_class_name);

    $store_code = '';
    $update_code = '';
    $validation_code = '';
    $validation_point = [];
    $embeded_with = '';

    foreach ($table_and_fields[$table_name] as $field) {
        if (in_array(strtolower($field), ['created_at', 'updated_at', 'deleted_at', 'id'])) {
            continue;
        }

        $store_code .= "\n\t\t\t'$field' => \$request->$field,";
        $update_code .= "\n\t\t\t$$generic_variable_name->$field = \$request->$field;";
        // 'email' => ['required', 'string', 'email', 'max:255', 'min:8', 'unique:users'],
        $validation_code .= "\n\t\t\t'$field' => ['required'],";

        $has_relation = preg_match('/_id/', $field);
        if ($has_relation) {
            $function_name = str_replace('_id', '', $field);
            $embeded_with .= "'".$function_name."', ";
        }
    }

        // reverse
    $relation_table_name = singular_noun($table_name).'_id';
    
    foreach ($table_and_fields as $table => $fields) {
    
        if(in_array($relation_table_name, $fields)) {
            $function_name = $table;
            $embeded_with .= "'".$function_name."', ";
        }
    }

    // default controller
    $mainController = "./laravel_project/app/Http/Controllers/Controller.php";
    if(!file_exists($mainController)) {
        $file = fopen($mainController, 'w');
        fwrite($file, <<<EOT
<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
EOT
    );
    fclose($file);
    }

/////////////////////////////////////////////////////////////////////
    // generated controller
    return <<<EOT
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\\{$model_class_name};

class {$class_name}Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return {$model_class_name}::whereNull('deleted_at')
        ->with([{$embeded_with}])
        ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  \$request
     * @return \Illuminate\Http\Response
     */
    public function store(Request \$request)
    {
        if(!\$this->validator(\$request)) {
            return [
                "success" => false,
                "message" => "form validation error"
            ];
        };

        // your code comes here

        if(\${$generic_variable_name} = {$model_class_name}::create([
            $store_code

        ])):
            return  \$$generic_variable_name;
        else:
            return [
                "success" => false,
                "message" => "data not saved"
            ];
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  \$id
     * @return \Illuminate\Http\Response
     */
    public function show(\$id)
    {
        if(\${$generic_variable_name} = {$model_class_name}
            ::whereNull('deleted_at')
            ->->with([{$embeded_with}])
            ->where('id', \$id)->first()):
            return \${$generic_variable_name};
        else:
                return [
                    "success" => false,
                    "message" => "data not exists"
                ];
        endif;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  \$id
     * @return \Illuminate\Http\Response
     */
    public function edit(\$id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  \$request
     * @param  int  \$id
     * @return \Illuminate\Http\Response
     */
    public function update(Request \$request, \$id)
    {

        if(!\$this->validator(\$request)) {
            return [
                "success" => false,
                "message" => "form validation error"
            ];
        };

        // your code comes here

        if(\${$generic_variable_name} = $model_class_name::find(\$id)):
            $update_code

            \${$generic_variable_name}->save();

            return  \${$generic_variable_name};
        else:
            return [
                "success" => false,
                "message" => "data not updated"
            ];
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  \$id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\$id)
    {
        if({$model_class_name}::destroy(\$id)):
            return [
                "success" => true,
                "message" => "data destoyed"
            ];
        else:
            return [
                "success" => false,
                "message" => "data not destoyed"
            ];
        endif;
    }

    /**
     * Soft delete the specified resource from storage.
     *
     * @param  int  \$id
     * @return \Illuminate\Http\Response
     */
    public function desactivate(\$id)
    {
        if(\${$generic_variable_name} = $model_class_name::find(\$id)):

            \${$generic_variable_name}->deleted_at = "'".date('Y-m-d h:i:s')."'";
            \${$generic_variable_name}->save();

            return  \${$generic_variable_name};
        else:
            return [
                "success" => false,
                "message" => "data not updated"
            ];
        endif;
    }

    /**
     * Soft delete the specified resource from storage.
     *
     * @param  int  \$id
     * @return \Illuminate\Http\Response
     */
    public function activate(\$id)
    {
        if(\${$generic_variable_name} = $model_class_name::find(\$id)):

            \${$generic_variable_name}->deleted_at = null;
            \${$generic_variable_name}->save();

            return  \${$generic_variable_name};
        else:
            return [
                "success" => false,
                "message" => "data not updated"
            ];
        endif;
    }

    /**
     * Get a validator for an incoming request.
     *
     * @param  array  \$request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request \$request)
    {
        \$validator = Validator::make(\$request->all(), [
            $validation_code

        ]);

        if(\$validator->fails()) return false;
        return true;
    }
}
EOT;
}

?>

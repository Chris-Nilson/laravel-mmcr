<?php
function detailed_routes_generator($tables_and_fields) {

    if(empty($tables_and_fields)) {
        return 0;
    }

    $routes = '';
    // index
    $routes .= "// listing routes\n";
    foreach ($tables_and_fields as $table_name => $value) {
        $class_name = str_replace('_', ' ', $table_name);

        $singular_name = str_split($table_name);
        if(strtolower($singular_name[count($singular_name)-1]) == 's') {
            $singular_name[count($singular_name)-1] = '';
        }
        $singular_name = implode('',$singular_name);

        $class_name = ucwords($class_name);
        $class_name = str_replace(' ', '', $class_name);
        $class_name = $class_name.'Controller';

        $routes .= "Route::get('$table_name', '$class_name@index');\n";
    }
    $routes .= "\n\n";

    // show
    $routes .= "// show routes\n";
    foreach ($tables_and_fields as $table_name => $value) {
        $class_name = str_replace('_', ' ', $table_name);
        $class_name = ucwords($class_name);
        $class_name = str_replace(' ', '', $class_name);
        $class_name = $class_name.'Controller';

        $singular_name = str_split($table_name);
        if(strtolower($singular_name[count($singular_name)-1]) == 's') {
            $singular_name[count($singular_name)-1] = '';
        }
        $singular_name = implode('',$singular_name);

        $routes .= "Route::get('$table_name/{{$singular_name}}', '$class_name@show');\n";
    }
    $routes .= "\n\n";

    // store
    $routes .= "// store routes\n";
    foreach ($tables_and_fields as $table_name => $value) {
        $class_name = str_replace('_', ' ', $table_name);
        $class_name = ucwords($class_name);
        $class_name = str_replace(' ', '', $class_name);
        $class_name = $class_name.'Controller';

        $routes .= "Route::post('$table_name/store', '$class_name@store');\n";
    }
    $routes .= "\n\n";

    // update
    $routes .= "// update routes\n";
    foreach ($tables_and_fields as $table_name => $value) {
        $class_name = str_replace('_', ' ', $table_name);
        $class_name = ucwords($class_name);
        $class_name = str_replace(' ', '', $class_name);
        $class_name = $class_name.'Controller';

        $singular_name = str_split($table_name);
        if(strtolower($singular_name[count($singular_name)-1]) == 's') {
            $singular_name[count($singular_name)-1] = '';
        }
        $singular_name = implode('',$singular_name);

        $routes .= "Route::post('$table_name/update/{{$singular_name}}', '$class_name@update');\n";
    }
    $routes .= "\n\n";

    // destroy
    $routes .= "// destroy routes\n";
    foreach ($tables_and_fields as $table_name => $value) {
        $class_name = str_replace('_', ' ', $table_name);
        $class_name = ucwords($class_name);
        $class_name = str_replace(' ', '', $class_name);
        $class_name = $class_name.'Controller';

        $singular_name = str_split($table_name);
        if(strtolower($singular_name[count($singular_name)-1]) == 's') {
            $singular_name[count($singular_name)-1] = '';
        }
        $singular_name = implode('',$singular_name);

        $routes .= "Route::post('$table_name/destroy/{{$singular_name}}', '$class_name@destroy');\n";
    }
    $routes .= "\n\n";


    $route_dir = "./laravel_project/routes";
    $api_routes_file_path = "detailed_api.php";
    $web_routes_file_path = "detailed_web.php";
    if(!is_dir($route_dir)) {
        if(!mkdir($route_dir, 0777, true)) {
            exit("Error creating $route_dir");
        }
    }

    $routes_code = <<<EOT
<?php

/*
|--------------------------------------------------------------------------
| Web/Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web/Api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

$routes
EOT;

    $api_stream = fopen($route_dir.'/'.$api_routes_file_path, 'w');
    $web_stream = fopen($route_dir.'/'.$web_routes_file_path, 'w');

    if ($file_stream = fopen($route_dir.'/'.$api_routes_file_path, 'w')) {
        fwrite($file_stream, $routes_code);
        echo "detailed api routes created\n";
    }

    if ($file_stream = fopen($route_dir.'/'.$web_routes_file_path, 'w')) {
        fwrite($file_stream, $routes_code);
        echo "detailed web routes created\n";
    }

    fclose($api_stream);
    fclose($web_stream);
}
?>

<?php
function routes_generator($tables_and_fields) {

    if(empty($tables_and_fields)) {
        return 0;
    }

    $routes = "";
    // index
    // $routes .= "// listing routes\n";
    foreach ($tables_and_fields as $table_name => $value) {
        $class_name = str_replace('_', ' ', $table_name);
        $class_name = ucwords($class_name);
        $class_name = str_replace(' ', '', $class_name);
        $class_name = $class_name.'Controller';

        $routes .= "\t'$table_name' => '$class_name',\n";
    }
    $routes .= "\n]);";

    $route_dir = "./laravel_project/routes";
    $api_routes_file_path = "api.php";
    $web_routes_file_path = "web.php";
    if(!is_dir($route_dir)) {
        if(!mkdir($route_dir, 0777, true)) {
            exit("Error creating $route_dir");
        }
    }

    $api_routes_code = <<<EOT
<?php

/** example
 * GET	        /photos	                index   photos.index
 * GET	        /photos/create	        create	photos.create
 * POST	        /photos	                store   photos.store
 * GET	        /photos/{photo}	        show	photos.show
 * GET	        /photos/{photo}/edit	edit	photos.edit
 * PUT/PATCH	/photos/{photo}	        update	photos.update
 * DELETE	    /photos/{photo}	        destroy	photos.destroy
 */

/*
|--------------------------------------------------------------------------
| Api Routes
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

Route::apiResources([\n
$routes
EOT;


$web_routes_code = <<<EOT
<?php

/** example
 * GET	        /photos	                index   photos.index
 * GET	        /photos/create	        create	photos.create
 * POST	        /photos	                store   photos.store
 * GET	        /photos/{photo}	        show	photos.show
 * GET	        /photos/{photo}/edit	edit	photos.edit
 * PUT/PATCH	/photos/{photo}	        update	photos.update
 * DELETE	    /photos/{photo}	        destroy	photos.destroy
 */

/*
|--------------------------------------------------------------------------
| Web Routes
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

Route::resources([\n
$routes
EOT;

    $api_stream = fopen($route_dir.'/'.$api_routes_file_path, 'w');
    $web_stream = fopen($route_dir.'/'.$web_routes_file_path, 'w');

    if ($file_stream = fopen($route_dir.'/'.$api_routes_file_path, 'w')) {
        fwrite($file_stream, $api_routes_code);
        echo "api routes created\n";
    }

    if ($file_stream = fopen($route_dir.'/'.$web_routes_file_path, 'w')) {
        fwrite($file_stream, $web_routes_code);
        echo "web routes created\n";
    }

    fclose($api_stream);
    fclose($web_stream);
}
?>
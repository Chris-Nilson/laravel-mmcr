<?php
namespace App;

function migrations_genrator($table_name, $generated_code) {
    $class_name = str_replace('_', ' ', $table_name);
    $class_name = ucwords($class_name);
    $class_name = str_replace(' ', '', $class_name);

    $code = <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create{$class_name}Table extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('{$table_name}', function (Blueprint \$table) {
            {$generated_code} 
            \$table->timestamps();

        });
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('{$table_name}');
    }
}
EOT;
    return $code;
    }


?>
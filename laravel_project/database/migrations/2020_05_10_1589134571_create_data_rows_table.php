<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataRowsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('data_rows', function (Blueprint $table) {
            
			$table->increments('id');
			$table->unsignedInteger('data_type_id');
			$table->string('field');
			$table->string('type');
			$table->string('display_name');
			$table->unsignedTinyInteger('required')->default('0');
			$table->unsignedTinyInteger('browse')->default('1');
			$table->unsignedTinyInteger('read')->default('1');
			$table->unsignedTinyInteger('edit')->default('1');
			$table->unsignedTinyInteger('add')->default('1');
			$table->unsignedTinyInteger('delete')->default('1');
			$table->text('details')->nullable();
			$table->unsignedInteger('order')->default('1'); 
            $table->timestamps();

        });
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('data_rows');
    }
}
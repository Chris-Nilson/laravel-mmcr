<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            
			$table->increments('id');
			$table->unsignedInteger('name');
			$table->string('cover_image')->nullable();
			$table->string('description')->nullable();
			$table->dateTime('start');
			$table->dateTime('end');
			$table->unsignedInteger('meeting_method_id');
			$table->string('join_link')->nullable(); 
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();

        });
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
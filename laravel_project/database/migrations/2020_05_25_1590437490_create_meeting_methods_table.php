<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingMethodsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('meeting_methods', function (Blueprint $table) {
            
			$table->increments('id');
			$table->string('name');
			$table->string('logo')->nullable();
			$table->string('description')->nullable();
			$table->string('contact')->nullable(); 
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
        Schema::dropIfExists('meeting_methods');
    }
}
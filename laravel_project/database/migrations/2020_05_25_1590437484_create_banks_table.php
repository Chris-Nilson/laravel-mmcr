<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            
			$table->increments('id');
			$table->string('name');
			$table->string('description')->nullable(); 
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
        Schema::dropIfExists('banks');
    }
}
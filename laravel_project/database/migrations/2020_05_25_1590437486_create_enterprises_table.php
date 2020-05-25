<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnterprisesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('enterprises', function (Blueprint $table) {
            
			$table->increments('id');
			$table->string('name');
			$table->string('logo')->nullable();
			$table->string('address')->nullable();
			$table->string('phone');
			$table->string('phone_alt')->nullable();
			$table->string('email');
			$table->string('email_alt')->nullable(); 
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
        Schema::dropIfExists('enterprises');
    }
}
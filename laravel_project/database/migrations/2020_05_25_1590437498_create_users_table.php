<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
			$table->increments('id');
			$table->string('username');
			$table->string('firstname')->nullable();
			$table->string('lastname')->nullable();
			$table->string('phone')->nullable();
			$table->string('phone_alt')->nullable();
			$table->string('email')->nullable();
			$table->string('password');
			$table->string('administrative_function')->nullable();
			$table->string('avatar')->nullable();
			$table->unsignedInteger('role_id');
			$table->unsignedInteger('enterprise_id')->nullable();
			$table->unsignedInteger('bank_id')->nullable(); 
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
        Schema::dropIfExists('users');
    }
}
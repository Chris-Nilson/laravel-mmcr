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
            
			$table->bigIncrements('id');
			$table->unsignedBigInteger('role_id')->nullable();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('avatar')->nullable()->default('users/default.png');
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password');
			$table->string('remember_token')->nullable();
			$table->text('settings')->nullable();
			$table->string('passport')->default('numpassport');
			$table->string('adress')->default('adresse');
			$table->string('phone')->default('0000000');
			$table->string('api_token')->nullable()->unique(); 
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
        Schema::dropIfExists('users');
    }
}
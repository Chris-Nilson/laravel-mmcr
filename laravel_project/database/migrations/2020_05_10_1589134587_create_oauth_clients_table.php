<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOauthClientsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('oauth_clients', function (Blueprint $table) {
            
			$table->bigIncrements('id');
			$table->unsignedBigInteger('user_id')->nullable();
			$table->string('name');
			$table->string('secret')->nullable();
			$table->text('redirect');
			$table->unsignedTinyInteger('personal_access_client');
			$table->unsignedTinyInteger('password_client');
			$table->unsignedTinyInteger('revoked'); 
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
        Schema::dropIfExists('oauth_clients');
    }
}
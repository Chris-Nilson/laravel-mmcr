<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOauthAuthCodesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('oauth_auth_codes', function (Blueprint $table) {
            
			$table->string('id');
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('client_id');
			$table->text('scopes')->nullable();
			$table->unsignedTinyInteger('revoked');
			$table->dateTime('expires_at')->nullable(); 
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
        Schema::dropIfExists('oauth_auth_codes');
    }
}
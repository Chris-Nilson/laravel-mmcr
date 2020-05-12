<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientAccountsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('client_accounts', function (Blueprint $table) {
            
			$table->bigIncrements('id');
			$table->double('totaldebts');
			$table->double('totalcredit');
			$table->unsignedBigInteger('client_id')->unique(); 
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
        Schema::dropIfExists('client_accounts');
    }
}
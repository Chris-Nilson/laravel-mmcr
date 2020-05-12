<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementstoreperimesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('movementstoreperimes', function (Blueprint $table) {
            
			$table->bigIncrements('id');
			$table->unsignedInteger('quantity_instock_before');
			$table->unsignedInteger('quantity_inperimes_before');
			$table->unsignedInteger('quantity');
			$table->enum('provenance', ['STORE','OFFICINE']);
			$table->enum('state', ['avarie','perime','none'])->default('none');
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('product_id'); 
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
        Schema::dropIfExists('movementstoreperimes');
    }
}
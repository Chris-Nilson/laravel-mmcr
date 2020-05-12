<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockOfficinesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('stock_officines', function (Blueprint $table) {
            
			$table->bigIncrements('id');
			$table->unsignedInteger('quantity');
			$table->unsignedBigInteger('product_id')->unique(); 
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
        Schema::dropIfExists('stock_officines');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockPerimesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('stock_perimes', function (Blueprint $table) {
            
			$table->bigIncrements('id');
			$table->unsignedInteger('quantity')->default('0');
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
        Schema::dropIfExists('stock_perimes');
    }
}
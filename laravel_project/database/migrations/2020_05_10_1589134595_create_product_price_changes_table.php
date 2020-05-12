<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPriceChangesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('product_price_changes', function (Blueprint $table) {
            
			$table->bigIncrements('id');
			$table->double('buy_price_before');
			$table->double('buy_price_after');
			$table->double('sell_price_before');
			$table->double('sell_price_after');
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
        Schema::dropIfExists('product_price_changes');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            
			$table->bigIncrements('id');
			$table->string('name');
			$table->string('description');
			$table->string('condition');
			$table->unsignedInteger('out_of_stock_condition');
			$table->unsignedInteger('profit');
			$table->unsignedTinyInteger('perishable');
			$table->string('cod_dci');
			$table->string('cod_cat');
			$table->string('cod_fam');
			$table->double('tva');
			$table->string('url_photo');
			$table->double('buy_price')->default('0.00');
			$table->double('marge')->default('0.00');
			$table->double('sell_price')->default('0.00');
			$table->unsignedBigInteger('category_id'); 
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
        Schema::dropIfExists('products');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmitOrdersTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('emit_orders', function (Blueprint $table) {
            
			$table->bigIncrements('id');
			$table->string('order_number')->unique();
			$table->longText('products');
			$table->unsignedBigInteger('supplier_id');
			$table->unsignedBigInteger('user_id'); 
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
        Schema::dropIfExists('emit_orders');
    }
}
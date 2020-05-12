<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivedOrdersTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('received_orders', function (Blueprint $table) {
            
			$table->bigIncrements('id');
			$table->string('delivery_note_number');
			$table->unsignedBigInteger('emit_order_id');
			$table->longText('products');
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
        Schema::dropIfExists('received_orders');
    }
}
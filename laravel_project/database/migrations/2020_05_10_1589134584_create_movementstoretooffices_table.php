<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementstoretoofficesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('movementstoretooffices', function (Blueprint $table) {
            
			$table->bigIncrements('id');
			$table->unsignedInteger('quantity_instore_before');
			$table->unsignedInteger('quantity_inofficine_before');
			$table->unsignedInteger('quantity_moved');
			$table->unsignedBigInteger('storekeeper_id');
			$table->unsignedBigInteger('user_id')->default('-1');
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
        Schema::dropIfExists('movementstoretooffices');
    }
}
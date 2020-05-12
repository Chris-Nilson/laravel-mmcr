<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementstoreofficedecomposedsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('movementstoreofficedecomposeds', function (Blueprint $table) {
            
			$table->bigIncrements('id');
			$table->unsignedInteger('quantity_box');
			$table->unsignedInteger('quantity_inofficine_before');
			$table->unsignedInteger('quantity_inofficinedecomposed_before');
			$table->unsignedInteger('quantity_tablet');
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
        Schema::dropIfExists('movementstoreofficedecomposeds');
    }
}
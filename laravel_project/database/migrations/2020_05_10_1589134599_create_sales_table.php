<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            
			$table->bigIncrements('id');
			$table->double('saletotalcost')->default('0.00');
			$table->double('received_cash')->default('0.00');
			$table->double('returned_cash')->default('0.00');
			$table->double('client_cost')->default('0.00');
			$table->double('insurance_cost')->default('0.00');
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('bucket_id');
			$table->unsignedBigInteger('client_id');
			$table->unsignedBigInteger('insurance_id')->default('-1');
			$table->unsignedBigInteger('entreprise_id')->default('-1'); 
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
        Schema::dropIfExists('sales');
    }
}
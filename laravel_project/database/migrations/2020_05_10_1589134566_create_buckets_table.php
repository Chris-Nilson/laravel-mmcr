<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBucketsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('buckets', function (Blueprint $table) {
            
			$table->bigIncrements('id');
			$table->enum('status', ['REJECTED','APPROVED','NONTREATED','TREATING']);
			$table->unsignedBigInteger('user_id');
			$table->enum('insurancy_type', ['PERSONAL','ENTREPRISE','NONE']);
			$table->longText('products');
			$table->unsignedBigInteger('client_id'); 
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
        Schema::dropIfExists('buckets');
    }
}
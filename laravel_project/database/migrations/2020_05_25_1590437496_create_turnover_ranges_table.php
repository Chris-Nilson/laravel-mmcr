<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnoverRangesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('turnover_ranges', function (Blueprint $table) {
            
			$table->increments('id');
			$table->string('name');
			$table->unsignedInteger('min');
			$table->unsignedInteger('max'); 
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();

        });
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('turnover_ranges');
    }
}
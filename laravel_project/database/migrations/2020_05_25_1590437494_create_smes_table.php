<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('smes', function (Blueprint $table) {
            
			$table->increments('id');
			$table->unsignedInteger('enterprise_id');
			$table->unsignedInteger('business_sector_id')->nullable();
			$table->string('business_sector_as_defined')->nullable();
			$table->string('rccm');
			$table->unsignedInteger('experience_range_id');
			$table->unsignedInteger('turnover_range_id');
			$table->enum('need_support_for', ['FINANCIAL','TECHNICAL','BOTH'])->default('BOTH');
			$table->enum('image_copyright', ['public','private'])->default('public'); 
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
        Schema::dropIfExists('smes');
    }
}
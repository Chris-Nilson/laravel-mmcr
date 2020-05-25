<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            
			$table->increments('id');
			$table->unsignedInteger('raised_id');
			$table->unsignedInteger('assignee_id');
			$table->unsignedInteger('subject');
			$table->enum('status', ['PENDING','APPROVED','CANCELED','CLOSED'])->default('PENDING');
			$table->dateTime('due_at');
			$table->unsignedInteger('meeting_method_id')->nullable();
			$table->string('join_link')->nullable(); 
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
        Schema::dropIfExists('tickets');
    }
}
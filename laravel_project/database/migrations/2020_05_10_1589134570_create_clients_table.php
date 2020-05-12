<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            
			$table->bigIncrements('id');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('address');
			$table->string('phone')->unique();
			$table->string('email')->unique();
			$table->string('insurance_number');
			$table->date('expiration_insurance');
			$table->date('expiration_identity');
			$table->enum('identity_type', ['CARTEIDENTITE','PASSEPORT','PERMIS','OTHER']);
			$table->enum('insurancy_type', ['ENTREPRISE','PERSONAL','NONASSURE','BOTH']);
			$table->unsignedTinyInteger('can_contract_debt');
			$table->double('debt_limit');
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
        Schema::dropIfExists('clients');
    }
}
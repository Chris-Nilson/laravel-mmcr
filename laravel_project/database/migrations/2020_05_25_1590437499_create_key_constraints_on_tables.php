
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeyConstraintsOnTables extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        
		Schema::table('activities', function (Blueprint $table) {

        $table->foreign('meeting_method_id')
            ->references('id')->on('meeting_methods')
            ->onDelete('cascade');
            
		});

		Schema::table('activity_resources', function (Blueprint $table) {

        $table->foreign('activity_id')
            ->references('id')->on('activities')
            ->onDelete('cascade');
            

        $table->foreign('resource_id')
            ->references('id')->on('resources')
            ->onDelete('cascade');
            
		});

		Schema::table('banks', function (Blueprint $table) {
			// code
		});

		Schema::table('business_sectors', function (Blueprint $table) {
			// code
		});

		Schema::table('enterprises', function (Blueprint $table) {
			// code
		});

		Schema::table('experience_ranges', function (Blueprint $table) {
			// code
		});

		Schema::table('faqs', function (Blueprint $table) {
			// code
		});

		Schema::table('house_of_smes', function (Blueprint $table) {
			// code
		});

		Schema::table('meeting_methods', function (Blueprint $table) {
			// code
		});

		Schema::table('partners', function (Blueprint $table) {

        $table->foreign('enterprise_id')
            ->references('id')->on('enterprises')
            ->onDelete('cascade');
            
		});

		Schema::table('resources', function (Blueprint $table) {
			// code
		});

		Schema::table('roles', function (Blueprint $table) {
			// code
		});

		Schema::table('smes', function (Blueprint $table) {

        $table->foreign('enterprise_id')
            ->references('id')->on('enterprises')
            ->onDelete('cascade');
            

        $table->foreign('business_sector_id')
            ->references('id')->on('business_sectors')
            ->onDelete('cascade');
            

        $table->foreign('experience_range_id')
            ->references('id')->on('experience_ranges')
            ->onDelete('cascade');
            

        $table->foreign('turnover_range_id')
            ->references('id')->on('turnover_ranges')
            ->onDelete('cascade');
            
		});

		Schema::table('tickets', function (Blueprint $table) {

        $table->foreign('meeting_method_id')
            ->references('id')->on('meeting_methods')
            ->onDelete('cascade');
            
		});

		Schema::table('turnover_ranges', function (Blueprint $table) {
			// code
		});

		Schema::table('useful_information', function (Blueprint $table) {
			// code
		});

		Schema::table('users', function (Blueprint $table) {

        $table->foreign('role_id')
            ->references('id')->on('roles')
            ->onDelete('cascade');
            

        $table->foreign('enterprise_id')
            ->references('id')->on('enterprises')
            ->onDelete('cascade');
            

        $table->foreign('bank_id')
            ->references('id')->on('banks')
            ->onDelete('cascade');
            
		});

    
        // TODO change reference table FOO to correct table
        Schema::table('tickets', function (Blueprint $table) {
            
        $table->foreign('raised_id')
            ->references('id')->on('FOO')
            ->onDelete('cascade');
        
		});

                
        // TODO change reference table FOO to correct table
        Schema::table('tickets', function (Blueprint $table) {
            
        $table->foreign('assignee_id')
            ->references('id')->on('FOO')
            ->onDelete('cascade');
        
		});

                
    
	}
}
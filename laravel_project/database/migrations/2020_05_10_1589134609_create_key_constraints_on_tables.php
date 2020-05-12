
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
        
		Schema::table('app_configs', function (Blueprint $table) {
			// code
		});

		Schema::table('buckets', function (Blueprint $table) {

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            

        $table->foreign('client_id')
            ->references('id')->on('clients')
            ->onDelete('cascade');
            
		});

		Schema::table('client_accounts', function (Blueprint $table) {

        $table->foreign('client_id')
            ->references('id')->on('clients')
            ->onDelete('cascade');
            
		});

		Schema::table('client_credits', function (Blueprint $table) {

        $table->foreign('client_id')
            ->references('id')->on('clients')
            ->onDelete('cascade');
            

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            
		});

		Schema::table('clients', function (Blueprint $table) {

        $table->foreign('insurance_id')
            ->references('id')->on('insurances')
            ->onDelete('cascade');
            

        $table->foreign('entreprise_id')
            ->references('id')->on('entreprises')
            ->onDelete('cascade');
            
		});

		Schema::table('data_rows', function (Blueprint $table) {

        $table->foreign('data_type_id')
            ->references('id')->on('data_types')
            ->onDelete('cascade');
            
		});

		Schema::table('data_types', function (Blueprint $table) {
			// code
		});

		Schema::table('debts', function (Blueprint $table) {

        $table->foreign('sale_id')
            ->references('id')->on('sales')
            ->onDelete('cascade');
            
		});

		Schema::table('emit_orders', function (Blueprint $table) {

        $table->foreign('supplier_id')
            ->references('id')->on('suppliers')
            ->onDelete('cascade');
            

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            
		});

		Schema::table('entreprises', function (Blueprint $table) {

        $table->foreign('insurance_id')
            ->references('id')->on('insurances')
            ->onDelete('cascade');
            
		});

		Schema::table('failed_jobs', function (Blueprint $table) {
			// code
		});

		Schema::table('finance_caisses', function (Blueprint $table) {

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            
		});

		Schema::table('insurances', function (Blueprint $table) {
			// code
		});

		Schema::table('inventories', function (Blueprint $table) {

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            
		});

		Schema::table('menu_items', function (Blueprint $table) {

        $table->foreign('menu_id')
            ->references('id')->on('menus')
            ->onDelete('cascade');
            
		});

		Schema::table('menus', function (Blueprint $table) {
			// code
		});

		Schema::table('movementstoreofficedecomposeds', function (Blueprint $table) {

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            

        $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade');
            
		});

		Schema::table('movementstoreperimes', function (Blueprint $table) {

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            

        $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade');
            
		});

		Schema::table('movementstoretooffices', function (Blueprint $table) {

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            

        $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade');
            
		});

		Schema::table('oauth_access_tokens', function (Blueprint $table) {

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            

        $table->foreign('client_id')
            ->references('id')->on('clients')
            ->onDelete('cascade');
            
		});

		Schema::table('oauth_auth_codes', function (Blueprint $table) {

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            

        $table->foreign('client_id')
            ->references('id')->on('clients')
            ->onDelete('cascade');
            
		});

		Schema::table('oauth_clients', function (Blueprint $table) {

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            
		});

		Schema::table('oauth_personal_access_clients', function (Blueprint $table) {

        $table->foreign('client_id')
            ->references('id')->on('clients')
            ->onDelete('cascade');
            
		});

		Schema::table('oauth_refresh_tokens', function (Blueprint $table) {
			// code
		});

		Schema::table('password_resets', function (Blueprint $table) {
			// code
		});

		Schema::table('permission_role', function (Blueprint $table) {

        $table->foreign('permission_id')
            ->references('id')->on('permissions')
            ->onDelete('cascade');
            

        $table->foreign('role_id')
            ->references('id')->on('roles')
            ->onDelete('cascade');
            
		});

		Schema::table('permissions', function (Blueprint $table) {
			// code
		});

		Schema::table('plan_orders', function (Blueprint $table) {

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            
		});

		Schema::table('product_categories', function (Blueprint $table) {
			// code
		});

		Schema::table('product_price_changes', function (Blueprint $table) {

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            

        $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade');
            
		});

		Schema::table('products', function (Blueprint $table) {
			// code
		});

		Schema::table('received_orders', function (Blueprint $table) {

        $table->foreign('emit_order_id')
            ->references('id')->on('emit_orders')
            ->onDelete('cascade');
            

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            
		});

		Schema::table('roles', function (Blueprint $table) {
			// code
		});

		Schema::table('sales', function (Blueprint $table) {

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            

        $table->foreign('bucket_id')
            ->references('id')->on('buckets')
            ->onDelete('cascade');
            

        $table->foreign('client_id')
            ->references('id')->on('clients')
            ->onDelete('cascade');
            

        $table->foreign('insurance_id')
            ->references('id')->on('insurances')
            ->onDelete('cascade');
            

        $table->foreign('entreprise_id')
            ->references('id')->on('entreprises')
            ->onDelete('cascade');
            
		});

		Schema::table('settings', function (Blueprint $table) {
			// code
		});

		Schema::table('stock_officine_decomposes', function (Blueprint $table) {

        $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade');
            
		});

		Schema::table('stock_officines', function (Blueprint $table) {

        $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade');
            
		});

		Schema::table('stock_perimes', function (Blueprint $table) {

        $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade');
            
		});

		Schema::table('stock_warehouses', function (Blueprint $table) {

        $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade');
            
		});

		Schema::table('suppliers', function (Blueprint $table) {
			// code
		});

		Schema::table('translations', function (Blueprint $table) {
			// code
		});

		Schema::table('user_roles', function (Blueprint $table) {

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            

        $table->foreign('role_id')
            ->references('id')->on('roles')
            ->onDelete('cascade');
            
		});

		Schema::table('users', function (Blueprint $table) {

        $table->foreign('role_id')
            ->references('id')->on('roles')
            ->onDelete('cascade');
            
		});

    
        // TODO change reference table FOO to correct table
        Schema::table('menu_items', function (Blueprint $table) {
            
        $table->foreign('parent_id')
            ->references('id')->on('FOO')
            ->onDelete('cascade');
        
		});

                
        // TODO change reference table FOO to correct table
        Schema::table('movementstoretooffices', function (Blueprint $table) {
            
        $table->foreign('storekeeper_id')
            ->references('id')->on('FOO')
            ->onDelete('cascade');
        
		});

                
        // TODO change reference table FOO to correct table
        Schema::table('oauth_refresh_tokens', function (Blueprint $table) {
            
        $table->foreign('access_token_id')
            ->references('id')->on('FOO')
            ->onDelete('cascade');
        
		});

                
        // TODO change reference table FOO to correct table
        Schema::table('products', function (Blueprint $table) {
            
        $table->foreign('category_id')
            ->references('id')->on('FOO')
            ->onDelete('cascade');
        
		});

                
    
	}
}
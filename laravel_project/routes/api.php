<?php

/** example
 * GET	        /photos	                index   photos.index
 * GET	        /photos/create	        create	photos.create
 * POST	        /photos	                store   photos.store
 * GET	        /photos/{photo}	        show	photos.show
 * GET	        /photos/{photo}/edit	edit	photos.edit
 * PUT/PATCH	/photos/{photo}	        update	photos.update
 * DELETE	    /photos/{photo}	        destroy	photos.destroy
 */

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web/Api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::apiResources([

	'app_configs' => 'AppConfigsController',
	'buckets' => 'BucketsController',
	'client_accounts' => 'ClientAccountsController',
	'client_credits' => 'ClientCreditsController',
	'clients' => 'ClientsController',
	'data_rows' => 'DataRowsController',
	'data_types' => 'DataTypesController',
	'debts' => 'DebtsController',
	'emit_orders' => 'EmitOrdersController',
	'entreprises' => 'EntreprisesController',
	'failed_jobs' => 'FailedJobsController',
	'finance_caisses' => 'FinanceCaissesController',
	'insurances' => 'InsurancesController',
	'inventories' => 'InventoriesController',
	'menu_items' => 'MenuItemsController',
	'menus' => 'MenusController',
	'movementstoreofficedecomposeds' => 'MovementstoreofficedecomposedsController',
	'movementstoreperimes' => 'MovementstoreperimesController',
	'movementstoretooffices' => 'MovementstoretoofficesController',
	'oauth_access_tokens' => 'OauthAccessTokensController',
	'oauth_auth_codes' => 'OauthAuthCodesController',
	'oauth_clients' => 'OauthClientsController',
	'oauth_personal_access_clients' => 'OauthPersonalAccessClientsController',
	'oauth_refresh_tokens' => 'OauthRefreshTokensController',
	'password_resets' => 'PasswordResetsController',
	'permission_role' => 'PermissionRoleController',
	'permissions' => 'PermissionsController',
	'plan_orders' => 'PlanOrdersController',
	'product_categories' => 'ProductCategoriesController',
	'product_price_changes' => 'ProductPriceChangesController',
	'products' => 'ProductsController',
	'received_orders' => 'ReceivedOrdersController',
	'roles' => 'RolesController',
	'sales' => 'SalesController',
	'settings' => 'SettingsController',
	'stock_officine_decomposes' => 'StockOfficineDecomposesController',
	'stock_officines' => 'StockOfficinesController',
	'stock_perimes' => 'StockPerimesController',
	'stock_warehouses' => 'StockWarehousesController',
	'suppliers' => 'SuppliersController',
	'translations' => 'TranslationsController',
	'user_roles' => 'UserRolesController',
	'users' => 'UsersController',

]);
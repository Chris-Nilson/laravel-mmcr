<?php

/*
|--------------------------------------------------------------------------
| Web/Api Routes
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

// listing routes
Route::get('app_configs', 'AppConfigsController@index');
Route::get('buckets', 'BucketsController@index');
Route::get('client_accounts', 'ClientAccountsController@index');
Route::get('client_credits', 'ClientCreditsController@index');
Route::get('clients', 'ClientsController@index');
Route::get('data_rows', 'DataRowsController@index');
Route::get('data_types', 'DataTypesController@index');
Route::get('debts', 'DebtsController@index');
Route::get('emit_orders', 'EmitOrdersController@index');
Route::get('entreprises', 'EntreprisesController@index');
Route::get('failed_jobs', 'FailedJobsController@index');
Route::get('finance_caisses', 'FinanceCaissesController@index');
Route::get('insurances', 'InsurancesController@index');
Route::get('inventories', 'InventoriesController@index');
Route::get('menu_items', 'MenuItemsController@index');
Route::get('menus', 'MenusController@index');
Route::get('movementstoreofficedecomposeds', 'MovementstoreofficedecomposedsController@index');
Route::get('movementstoreperimes', 'MovementstoreperimesController@index');
Route::get('movementstoretooffices', 'MovementstoretoofficesController@index');
Route::get('oauth_access_tokens', 'OauthAccessTokensController@index');
Route::get('oauth_auth_codes', 'OauthAuthCodesController@index');
Route::get('oauth_clients', 'OauthClientsController@index');
Route::get('oauth_personal_access_clients', 'OauthPersonalAccessClientsController@index');
Route::get('oauth_refresh_tokens', 'OauthRefreshTokensController@index');
Route::get('password_resets', 'PasswordResetsController@index');
Route::get('permission_role', 'PermissionRoleController@index');
Route::get('permissions', 'PermissionsController@index');
Route::get('plan_orders', 'PlanOrdersController@index');
Route::get('product_categories', 'ProductCategoriesController@index');
Route::get('product_price_changes', 'ProductPriceChangesController@index');
Route::get('products', 'ProductsController@index');
Route::get('received_orders', 'ReceivedOrdersController@index');
Route::get('roles', 'RolesController@index');
Route::get('sales', 'SalesController@index');
Route::get('settings', 'SettingsController@index');
Route::get('stock_officine_decomposes', 'StockOfficineDecomposesController@index');
Route::get('stock_officines', 'StockOfficinesController@index');
Route::get('stock_perimes', 'StockPerimesController@index');
Route::get('stock_warehouses', 'StockWarehousesController@index');
Route::get('suppliers', 'SuppliersController@index');
Route::get('translations', 'TranslationsController@index');
Route::get('user_roles', 'UserRolesController@index');
Route::get('users', 'UsersController@index');


// show routes
Route::get('app_configs/{app_config}', 'AppConfigsController@show');
Route::get('buckets/{bucket}', 'BucketsController@show');
Route::get('client_accounts/{client_account}', 'ClientAccountsController@show');
Route::get('client_credits/{client_credit}', 'ClientCreditsController@show');
Route::get('clients/{client}', 'ClientsController@show');
Route::get('data_rows/{data_row}', 'DataRowsController@show');
Route::get('data_types/{data_type}', 'DataTypesController@show');
Route::get('debts/{debt}', 'DebtsController@show');
Route::get('emit_orders/{emit_order}', 'EmitOrdersController@show');
Route::get('entreprises/{entreprise}', 'EntreprisesController@show');
Route::get('failed_jobs/{failed_job}', 'FailedJobsController@show');
Route::get('finance_caisses/{finance_caisse}', 'FinanceCaissesController@show');
Route::get('insurances/{insurance}', 'InsurancesController@show');
Route::get('inventories/{inventorie}', 'InventoriesController@show');
Route::get('menu_items/{menu_item}', 'MenuItemsController@show');
Route::get('menus/{menu}', 'MenusController@show');
Route::get('movementstoreofficedecomposeds/{movementstoreofficedecomposed}', 'MovementstoreofficedecomposedsController@show');
Route::get('movementstoreperimes/{movementstoreperime}', 'MovementstoreperimesController@show');
Route::get('movementstoretooffices/{movementstoretooffice}', 'MovementstoretoofficesController@show');
Route::get('oauth_access_tokens/{oauth_access_token}', 'OauthAccessTokensController@show');
Route::get('oauth_auth_codes/{oauth_auth_code}', 'OauthAuthCodesController@show');
Route::get('oauth_clients/{oauth_client}', 'OauthClientsController@show');
Route::get('oauth_personal_access_clients/{oauth_personal_access_client}', 'OauthPersonalAccessClientsController@show');
Route::get('oauth_refresh_tokens/{oauth_refresh_token}', 'OauthRefreshTokensController@show');
Route::get('password_resets/{password_reset}', 'PasswordResetsController@show');
Route::get('permission_role/{permission_role}', 'PermissionRoleController@show');
Route::get('permissions/{permission}', 'PermissionsController@show');
Route::get('plan_orders/{plan_order}', 'PlanOrdersController@show');
Route::get('product_categories/{product_categorie}', 'ProductCategoriesController@show');
Route::get('product_price_changes/{product_price_change}', 'ProductPriceChangesController@show');
Route::get('products/{product}', 'ProductsController@show');
Route::get('received_orders/{received_order}', 'ReceivedOrdersController@show');
Route::get('roles/{role}', 'RolesController@show');
Route::get('sales/{sale}', 'SalesController@show');
Route::get('settings/{setting}', 'SettingsController@show');
Route::get('stock_officine_decomposes/{stock_officine_decompose}', 'StockOfficineDecomposesController@show');
Route::get('stock_officines/{stock_officine}', 'StockOfficinesController@show');
Route::get('stock_perimes/{stock_perime}', 'StockPerimesController@show');
Route::get('stock_warehouses/{stock_warehouse}', 'StockWarehousesController@show');
Route::get('suppliers/{supplier}', 'SuppliersController@show');
Route::get('translations/{translation}', 'TranslationsController@show');
Route::get('user_roles/{user_role}', 'UserRolesController@show');
Route::get('users/{user}', 'UsersController@show');


// store routes
Route::post('app_configs/store', 'AppConfigsController@store');
Route::post('buckets/store', 'BucketsController@store');
Route::post('client_accounts/store', 'ClientAccountsController@store');
Route::post('client_credits/store', 'ClientCreditsController@store');
Route::post('clients/store', 'ClientsController@store');
Route::post('data_rows/store', 'DataRowsController@store');
Route::post('data_types/store', 'DataTypesController@store');
Route::post('debts/store', 'DebtsController@store');
Route::post('emit_orders/store', 'EmitOrdersController@store');
Route::post('entreprises/store', 'EntreprisesController@store');
Route::post('failed_jobs/store', 'FailedJobsController@store');
Route::post('finance_caisses/store', 'FinanceCaissesController@store');
Route::post('insurances/store', 'InsurancesController@store');
Route::post('inventories/store', 'InventoriesController@store');
Route::post('menu_items/store', 'MenuItemsController@store');
Route::post('menus/store', 'MenusController@store');
Route::post('movementstoreofficedecomposeds/store', 'MovementstoreofficedecomposedsController@store');
Route::post('movementstoreperimes/store', 'MovementstoreperimesController@store');
Route::post('movementstoretooffices/store', 'MovementstoretoofficesController@store');
Route::post('oauth_access_tokens/store', 'OauthAccessTokensController@store');
Route::post('oauth_auth_codes/store', 'OauthAuthCodesController@store');
Route::post('oauth_clients/store', 'OauthClientsController@store');
Route::post('oauth_personal_access_clients/store', 'OauthPersonalAccessClientsController@store');
Route::post('oauth_refresh_tokens/store', 'OauthRefreshTokensController@store');
Route::post('password_resets/store', 'PasswordResetsController@store');
Route::post('permission_role/store', 'PermissionRoleController@store');
Route::post('permissions/store', 'PermissionsController@store');
Route::post('plan_orders/store', 'PlanOrdersController@store');
Route::post('product_categories/store', 'ProductCategoriesController@store');
Route::post('product_price_changes/store', 'ProductPriceChangesController@store');
Route::post('products/store', 'ProductsController@store');
Route::post('received_orders/store', 'ReceivedOrdersController@store');
Route::post('roles/store', 'RolesController@store');
Route::post('sales/store', 'SalesController@store');
Route::post('settings/store', 'SettingsController@store');
Route::post('stock_officine_decomposes/store', 'StockOfficineDecomposesController@store');
Route::post('stock_officines/store', 'StockOfficinesController@store');
Route::post('stock_perimes/store', 'StockPerimesController@store');
Route::post('stock_warehouses/store', 'StockWarehousesController@store');
Route::post('suppliers/store', 'SuppliersController@store');
Route::post('translations/store', 'TranslationsController@store');
Route::post('user_roles/store', 'UserRolesController@store');
Route::post('users/store', 'UsersController@store');


// update routes
Route::post('app_configs/update/{app_config}', 'AppConfigsController@update');
Route::post('buckets/update/{bucket}', 'BucketsController@update');
Route::post('client_accounts/update/{client_account}', 'ClientAccountsController@update');
Route::post('client_credits/update/{client_credit}', 'ClientCreditsController@update');
Route::post('clients/update/{client}', 'ClientsController@update');
Route::post('data_rows/update/{data_row}', 'DataRowsController@update');
Route::post('data_types/update/{data_type}', 'DataTypesController@update');
Route::post('debts/update/{debt}', 'DebtsController@update');
Route::post('emit_orders/update/{emit_order}', 'EmitOrdersController@update');
Route::post('entreprises/update/{entreprise}', 'EntreprisesController@update');
Route::post('failed_jobs/update/{failed_job}', 'FailedJobsController@update');
Route::post('finance_caisses/update/{finance_caisse}', 'FinanceCaissesController@update');
Route::post('insurances/update/{insurance}', 'InsurancesController@update');
Route::post('inventories/update/{inventorie}', 'InventoriesController@update');
Route::post('menu_items/update/{menu_item}', 'MenuItemsController@update');
Route::post('menus/update/{menu}', 'MenusController@update');
Route::post('movementstoreofficedecomposeds/update/{movementstoreofficedecomposed}', 'MovementstoreofficedecomposedsController@update');
Route::post('movementstoreperimes/update/{movementstoreperime}', 'MovementstoreperimesController@update');
Route::post('movementstoretooffices/update/{movementstoretooffice}', 'MovementstoretoofficesController@update');
Route::post('oauth_access_tokens/update/{oauth_access_token}', 'OauthAccessTokensController@update');
Route::post('oauth_auth_codes/update/{oauth_auth_code}', 'OauthAuthCodesController@update');
Route::post('oauth_clients/update/{oauth_client}', 'OauthClientsController@update');
Route::post('oauth_personal_access_clients/update/{oauth_personal_access_client}', 'OauthPersonalAccessClientsController@update');
Route::post('oauth_refresh_tokens/update/{oauth_refresh_token}', 'OauthRefreshTokensController@update');
Route::post('password_resets/update/{password_reset}', 'PasswordResetsController@update');
Route::post('permission_role/update/{permission_role}', 'PermissionRoleController@update');
Route::post('permissions/update/{permission}', 'PermissionsController@update');
Route::post('plan_orders/update/{plan_order}', 'PlanOrdersController@update');
Route::post('product_categories/update/{product_categorie}', 'ProductCategoriesController@update');
Route::post('product_price_changes/update/{product_price_change}', 'ProductPriceChangesController@update');
Route::post('products/update/{product}', 'ProductsController@update');
Route::post('received_orders/update/{received_order}', 'ReceivedOrdersController@update');
Route::post('roles/update/{role}', 'RolesController@update');
Route::post('sales/update/{sale}', 'SalesController@update');
Route::post('settings/update/{setting}', 'SettingsController@update');
Route::post('stock_officine_decomposes/update/{stock_officine_decompose}', 'StockOfficineDecomposesController@update');
Route::post('stock_officines/update/{stock_officine}', 'StockOfficinesController@update');
Route::post('stock_perimes/update/{stock_perime}', 'StockPerimesController@update');
Route::post('stock_warehouses/update/{stock_warehouse}', 'StockWarehousesController@update');
Route::post('suppliers/update/{supplier}', 'SuppliersController@update');
Route::post('translations/update/{translation}', 'TranslationsController@update');
Route::post('user_roles/update/{user_role}', 'UserRolesController@update');
Route::post('users/update/{user}', 'UsersController@update');


// destroy routes
Route::post('app_configs/destroy/{app_config}', 'AppConfigsController@destroy');
Route::post('buckets/destroy/{bucket}', 'BucketsController@destroy');
Route::post('client_accounts/destroy/{client_account}', 'ClientAccountsController@destroy');
Route::post('client_credits/destroy/{client_credit}', 'ClientCreditsController@destroy');
Route::post('clients/destroy/{client}', 'ClientsController@destroy');
Route::post('data_rows/destroy/{data_row}', 'DataRowsController@destroy');
Route::post('data_types/destroy/{data_type}', 'DataTypesController@destroy');
Route::post('debts/destroy/{debt}', 'DebtsController@destroy');
Route::post('emit_orders/destroy/{emit_order}', 'EmitOrdersController@destroy');
Route::post('entreprises/destroy/{entreprise}', 'EntreprisesController@destroy');
Route::post('failed_jobs/destroy/{failed_job}', 'FailedJobsController@destroy');
Route::post('finance_caisses/destroy/{finance_caisse}', 'FinanceCaissesController@destroy');
Route::post('insurances/destroy/{insurance}', 'InsurancesController@destroy');
Route::post('inventories/destroy/{inventorie}', 'InventoriesController@destroy');
Route::post('menu_items/destroy/{menu_item}', 'MenuItemsController@destroy');
Route::post('menus/destroy/{menu}', 'MenusController@destroy');
Route::post('movementstoreofficedecomposeds/destroy/{movementstoreofficedecomposed}', 'MovementstoreofficedecomposedsController@destroy');
Route::post('movementstoreperimes/destroy/{movementstoreperime}', 'MovementstoreperimesController@destroy');
Route::post('movementstoretooffices/destroy/{movementstoretooffice}', 'MovementstoretoofficesController@destroy');
Route::post('oauth_access_tokens/destroy/{oauth_access_token}', 'OauthAccessTokensController@destroy');
Route::post('oauth_auth_codes/destroy/{oauth_auth_code}', 'OauthAuthCodesController@destroy');
Route::post('oauth_clients/destroy/{oauth_client}', 'OauthClientsController@destroy');
Route::post('oauth_personal_access_clients/destroy/{oauth_personal_access_client}', 'OauthPersonalAccessClientsController@destroy');
Route::post('oauth_refresh_tokens/destroy/{oauth_refresh_token}', 'OauthRefreshTokensController@destroy');
Route::post('password_resets/destroy/{password_reset}', 'PasswordResetsController@destroy');
Route::post('permission_role/destroy/{permission_role}', 'PermissionRoleController@destroy');
Route::post('permissions/destroy/{permission}', 'PermissionsController@destroy');
Route::post('plan_orders/destroy/{plan_order}', 'PlanOrdersController@destroy');
Route::post('product_categories/destroy/{product_categorie}', 'ProductCategoriesController@destroy');
Route::post('product_price_changes/destroy/{product_price_change}', 'ProductPriceChangesController@destroy');
Route::post('products/destroy/{product}', 'ProductsController@destroy');
Route::post('received_orders/destroy/{received_order}', 'ReceivedOrdersController@destroy');
Route::post('roles/destroy/{role}', 'RolesController@destroy');
Route::post('sales/destroy/{sale}', 'SalesController@destroy');
Route::post('settings/destroy/{setting}', 'SettingsController@destroy');
Route::post('stock_officine_decomposes/destroy/{stock_officine_decompose}', 'StockOfficineDecomposesController@destroy');
Route::post('stock_officines/destroy/{stock_officine}', 'StockOfficinesController@destroy');
Route::post('stock_perimes/destroy/{stock_perime}', 'StockPerimesController@destroy');
Route::post('stock_warehouses/destroy/{stock_warehouse}', 'StockWarehousesController@destroy');
Route::post('suppliers/destroy/{supplier}', 'SuppliersController@destroy');
Route::post('translations/destroy/{translation}', 'TranslationsController@destroy');
Route::post('user_roles/destroy/{user_role}', 'UserRolesController@destroy');
Route::post('users/destroy/{user}', 'UsersController@destroy');



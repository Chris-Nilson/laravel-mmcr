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
| Web Routes
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

Route::resources([

	'activities' => 'ActivitiesController',
	'activity_resources' => 'ActivityResourcesController',
	'banks' => 'BanksController',
	'business_sectors' => 'BusinessSectorsController',
	'enterprises' => 'EnterprisesController',
	'experience_ranges' => 'ExperienceRangesController',
	'faqs' => 'FaqsController',
	'house_of_smes' => 'HouseOfSmesController',
	'meeting_methods' => 'MeetingMethodsController',
	'partners' => 'PartnersController',
	'resources' => 'ResourcesController',
	'roles' => 'RolesController',
	'smes' => 'SmesController',
	'tickets' => 'TicketsController',
	'turnover_ranges' => 'TurnoverRangesController',
	'useful_information' => 'UsefulInformationController',
	'users' => 'UsersController',

]);
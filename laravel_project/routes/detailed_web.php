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
Route::get('activities', 'ActivitiesController@index');
Route::get('activity_resources', 'ActivityResourcesController@index');
Route::get('banks', 'BanksController@index');
Route::get('business_sectors', 'BusinessSectorsController@index');
Route::get('enterprises', 'EnterprisesController@index');
Route::get('experience_ranges', 'ExperienceRangesController@index');
Route::get('faqs', 'FaqsController@index');
Route::get('house_of_smes', 'HouseOfSmesController@index');
Route::get('meeting_methods', 'MeetingMethodsController@index');
Route::get('partners', 'PartnersController@index');
Route::get('resources', 'ResourcesController@index');
Route::get('roles', 'RolesController@index');
Route::get('smes', 'SmesController@index');
Route::get('tickets', 'TicketsController@index');
Route::get('turnover_ranges', 'TurnoverRangesController@index');
Route::get('useful_information', 'UsefulInformationController@index');
Route::get('users', 'UsersController@index');


// show routes
Route::get('activities/{activity}', 'ActivitiesController@show');
Route::get('activity_resources/{activity_resource}', 'ActivityResourcesController@show');
Route::get('banks/{bank}', 'BanksController@show');
Route::get('business_sectors/{business_sector}', 'BusinessSectorsController@show');
Route::get('enterprises/{enterprise}', 'EnterprisesController@show');
Route::get('experience_ranges/{experience_range}', 'ExperienceRangesController@show');
Route::get('faqs/{faq}', 'FaqsController@show');
Route::get('house_of_smes/{house_of_sme}', 'HouseOfSmesController@show');
Route::get('meeting_methods/{meeting_method}', 'MeetingMethodsController@show');
Route::get('partners/{partner}', 'PartnersController@show');
Route::get('resources/{resource}', 'ResourcesController@show');
Route::get('roles/{role}', 'RolesController@show');
Route::get('smes/{sme}', 'SmesController@show');
Route::get('tickets/{ticket}', 'TicketsController@show');
Route::get('turnover_ranges/{turnover_range}', 'TurnoverRangesController@show');
Route::get('useful_information/{useful_information}', 'UsefulInformationController@show');
Route::get('users/{user}', 'UsersController@show');


// store routes
Route::post('activities/store', 'ActivitiesController@store');
Route::post('activity_resources/store', 'ActivityResourcesController@store');
Route::post('banks/store', 'BanksController@store');
Route::post('business_sectors/store', 'BusinessSectorsController@store');
Route::post('enterprises/store', 'EnterprisesController@store');
Route::post('experience_ranges/store', 'ExperienceRangesController@store');
Route::post('faqs/store', 'FaqsController@store');
Route::post('house_of_smes/store', 'HouseOfSmesController@store');
Route::post('meeting_methods/store', 'MeetingMethodsController@store');
Route::post('partners/store', 'PartnersController@store');
Route::post('resources/store', 'ResourcesController@store');
Route::post('roles/store', 'RolesController@store');
Route::post('smes/store', 'SmesController@store');
Route::post('tickets/store', 'TicketsController@store');
Route::post('turnover_ranges/store', 'TurnoverRangesController@store');
Route::post('useful_information/store', 'UsefulInformationController@store');
Route::post('users/store', 'UsersController@store');


// update routes
Route::post('activities/update/{activity}', 'ActivitiesController@update');
Route::post('activity_resources/update/{activity_resource}', 'ActivityResourcesController@update');
Route::post('banks/update/{bank}', 'BanksController@update');
Route::post('business_sectors/update/{business_sector}', 'BusinessSectorsController@update');
Route::post('enterprises/update/{enterprise}', 'EnterprisesController@update');
Route::post('experience_ranges/update/{experience_range}', 'ExperienceRangesController@update');
Route::post('faqs/update/{faq}', 'FaqsController@update');
Route::post('house_of_smes/update/{house_of_sme}', 'HouseOfSmesController@update');
Route::post('meeting_methods/update/{meeting_method}', 'MeetingMethodsController@update');
Route::post('partners/update/{partner}', 'PartnersController@update');
Route::post('resources/update/{resource}', 'ResourcesController@update');
Route::post('roles/update/{role}', 'RolesController@update');
Route::post('smes/update/{sme}', 'SmesController@update');
Route::post('tickets/update/{ticket}', 'TicketsController@update');
Route::post('turnover_ranges/update/{turnover_range}', 'TurnoverRangesController@update');
Route::post('useful_information/update/{useful_information}', 'UsefulInformationController@update');
Route::post('users/update/{user}', 'UsersController@update');


// activation routes
Route::post('activities/activate/{activity}', 'ActivitiesController@activate');
Route::post('activity_resources/activate/{activity_resource}', 'ActivityResourcesController@activate');
Route::post('banks/activate/{bank}', 'BanksController@activate');
Route::post('business_sectors/activate/{business_sector}', 'BusinessSectorsController@activate');
Route::post('enterprises/activate/{enterprise}', 'EnterprisesController@activate');
Route::post('experience_ranges/activate/{experience_range}', 'ExperienceRangesController@activate');
Route::post('faqs/activate/{faq}', 'FaqsController@activate');
Route::post('house_of_smes/activate/{house_of_sme}', 'HouseOfSmesController@activate');
Route::post('meeting_methods/activate/{meeting_method}', 'MeetingMethodsController@activate');
Route::post('partners/activate/{partner}', 'PartnersController@activate');
Route::post('resources/activate/{resource}', 'ResourcesController@activate');
Route::post('roles/activate/{role}', 'RolesController@activate');
Route::post('smes/activate/{sme}', 'SmesController@activate');
Route::post('tickets/activate/{ticket}', 'TicketsController@activate');
Route::post('turnover_ranges/activate/{turnover_range}', 'TurnoverRangesController@activate');
Route::post('useful_information/activate/{useful_information}', 'UsefulInformationController@activate');
Route::post('users/activate/{user}', 'UsersController@activate');


// soft delete routes
Route::post('activities/desactivate/{activity}', 'ActivitiesController@desactivate');
Route::post('activity_resources/desactivate/{activity_resource}', 'ActivityResourcesController@desactivate');
Route::post('banks/desactivate/{bank}', 'BanksController@desactivate');
Route::post('business_sectors/desactivate/{business_sector}', 'BusinessSectorsController@desactivate');
Route::post('enterprises/desactivate/{enterprise}', 'EnterprisesController@desactivate');
Route::post('experience_ranges/desactivate/{experience_range}', 'ExperienceRangesController@desactivate');
Route::post('faqs/desactivate/{faq}', 'FaqsController@desactivate');
Route::post('house_of_smes/desactivate/{house_of_sme}', 'HouseOfSmesController@desactivate');
Route::post('meeting_methods/desactivate/{meeting_method}', 'MeetingMethodsController@desactivate');
Route::post('partners/desactivate/{partner}', 'PartnersController@desactivate');
Route::post('resources/desactivate/{resource}', 'ResourcesController@desactivate');
Route::post('roles/desactivate/{role}', 'RolesController@desactivate');
Route::post('smes/desactivate/{sme}', 'SmesController@desactivate');
Route::post('tickets/desactivate/{ticket}', 'TicketsController@desactivate');
Route::post('turnover_ranges/desactivate/{turnover_range}', 'TurnoverRangesController@desactivate');
Route::post('useful_information/desactivate/{useful_information}', 'UsefulInformationController@desactivate');
Route::post('users/desactivate/{user}', 'UsersController@desactivate');


// destroy routes
Route::post('activities/destroy/{activity}', 'ActivitiesController@destroy');
Route::post('activity_resources/destroy/{activity_resource}', 'ActivityResourcesController@destroy');
Route::post('banks/destroy/{bank}', 'BanksController@destroy');
Route::post('business_sectors/destroy/{business_sector}', 'BusinessSectorsController@destroy');
Route::post('enterprises/destroy/{enterprise}', 'EnterprisesController@destroy');
Route::post('experience_ranges/destroy/{experience_range}', 'ExperienceRangesController@destroy');
Route::post('faqs/destroy/{faq}', 'FaqsController@destroy');
Route::post('house_of_smes/destroy/{house_of_sme}', 'HouseOfSmesController@destroy');
Route::post('meeting_methods/destroy/{meeting_method}', 'MeetingMethodsController@destroy');
Route::post('partners/destroy/{partner}', 'PartnersController@destroy');
Route::post('resources/destroy/{resource}', 'ResourcesController@destroy');
Route::post('roles/destroy/{role}', 'RolesController@destroy');
Route::post('smes/destroy/{sme}', 'SmesController@destroy');
Route::post('tickets/destroy/{ticket}', 'TicketsController@destroy');
Route::post('turnover_ranges/destroy/{turnover_range}', 'TurnoverRangesController@destroy');
Route::post('useful_information/destroy/{useful_information}', 'UsefulInformationController@destroy');
Route::post('users/destroy/{user}', 'UsersController@destroy');



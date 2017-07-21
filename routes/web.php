<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>['web','locale']], function(){
    Route::get('/', 'HomeController@index');
    Route::post('/', 'HomeController@lang');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

// Admin dashborad routes
Route::group(['middleware'=>'auth:admins', 'prefix'=>'dashboard'], function(){

	Route::get('/', 'DashboardController@index');

	// main settings routes
	Route::get('settings/main',     'SettingsController@main_settings');
    Route::post('settings/main',    'SettingsController@save_settings');

	// classifications routes
	Route::get('settings/classifications', 				'SettingsController@companies_classifications');
	Route::post('settings/classifications', 			'SettingsController@create_classification');
	Route::post('settings/classifications/{id}', 		'SettingsController@update_classification');
	Route::post('settings/classifications/delete/{id}', 'SettingsController@delete_classification');

    // sections routes
    Route::get('settings/sections', 				'SettingsController@ads_sections');
    Route::post('settings/sections', 			    'SettingsController@create_section');
    Route::post('settings/sections/{id}', 		    'SettingsController@update_section');
    Route::post('settings/sections/delete/{id}',    'SettingsController@delete_section');

    // types routes
    Route::get('settings/types', 				'SettingsController@ads_types');
    Route::post('settings/types', 			    'SettingsController@create_type');
    Route::post('settings/types/{id}', 		    'SettingsController@update_type');
    Route::post('settings/types/delete/{id}',   'SettingsController@delete_type');

    // governorates routes
    Route::get('settings/governorates', 				'SettingsController@governorates');
    Route::post('settings/governorates', 			    'SettingsController@create_governorate');
    Route::post('settings/governorates/{id}', 		    'SettingsController@update_governorate');
    Route::post('settings/governorates/delete/{id}',    'SettingsController@delete_governorate');

    // cities routes
    Route::post('settings/cities/{governorate_id}', 	'SettingsController@create_city');
    Route::post('settings/cities/update/{id}', 		        'SettingsController@update_city');
    Route::post('settings/cities/delete/{id}',          'SettingsController@delete_city');

    // users routes
    Route::get('users',                 'UsersController@index');       // get all users
    Route::get('users/{id}',            'UsersController@show');        // get user data
    Route::post('users/activate/{id}',  'UsersController@activate');    // activate user
    Route::post('users/delete/{id}',    'UsersController@delete');      // delete user

    // notifications routes
    Route::post('notifications/send',   'NotificationsController@send');    // send notification to user
	
});


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['web']], function(){

	// Admin dashborad routes
	Route::group(['prefix'=>'dashboard'], function(){

		Route::get('/', 'DashboardController@index');

		// main settings routes
		Route::get('settings/main', 						'SettingsController@main_settings');
		Route::get('settings/classifications', 				'SettingsController@companies_classifications');
		Route::post('settings/classifications', 			'SettingsController@create_classification');
		Route::post('settings/classifications/{id}', 		'SettingsController@update_classification');
		Route::post('settings/classifications/delete/{id}', 'SettingsController@delete_classification');
	});
		
});


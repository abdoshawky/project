<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// login route ( type => user, company)
Route::post('{type}/login',     'AuthController@login');
// registration routes
Route::post('{type}/register',  'AuthController@register');

// forger password routes
Route::post('{type}/password/forget',       'AuthController@forget_password');
Route::post('{type}/password/reset/{code}', 'AuthController@reset_password');

// contact us route
Route::post('contact',  'ContactController@app_contacts');

// ads route
Route::get('ads/search',                'AdsController@search_ads');
Route::get('ads/section/{section_id}',  'AdsController@section_ads')->where('section_id', '[0-9]+'); // all section ads route

// all classification companies route
Route::get('companies/search',                              'CompaniesController@search_companies');
Route::get('companies/classification/{classification_id}',  'CompaniesController@classification_companies')->where('classification_id', '[0-9]+');

// user routes
Route::group(['middleware'=>'auth:api_user','prefix'=>'user'], function(){

    // activate account route
    Route::post('/activate',        'AuthController@activate_account');         // active account with activation code
    Route::post('activate/resend',  'AuthController@resend_activation_code');   // resend activation code

    // authenticated user routes
    Route::group(['middleware'=>'active'], function(){

        // change password route
        Route::put('password/change', 'AuthController@change_password');

        // change account settings
        Route::put('account/settings/update', 'UsersController@update_settings');

        // add routes
        Route::get('ads',           'AdsController@my_ads');    // all user ads
        Route::post('ads/create',   'AdsController@create');    // add new ad
        Route::get('ads/{id}',      'AdsController@show');      // show existing ad
        Route::put('ads/{id}',      'AdsController@update');    // update existing ad
        Route::delete('ads/{id}',   'AdsController@delete');    // delete an ad

        // comments routes
        Route::post('comments/create', 'CommentsController@create');    // add new comment

        // favourites routes
        Route::get('favourites/{type?}',        'FavouritesController@favourites');         // get all favourites
        Route::post('favourites/add',           'FavouritesController@add_favourite');      // add new favourite
        Route::delete('favourites/remove/{id}', 'FavouritesController@remove_favourite');   // remove favourite

        // rate routes
        Route::post('rates/create', 'RatesController@create'); // add new rate

    });
});

// companies routes
Route::group(['middleware'=>'auth:api_company','prefix'=>'company'], function(){

    // activate account route
    Route::post('/activate',        'AuthController@activate_account');         // active account with activation code
    Route::post('activate/resend',  'AuthController@resend_activation_code');   // resend activation code

    // authenticated user routes
    Route::group(['middleware'=>'active'], function(){

        // change password route
        Route::post('password/change', 'AuthController@change_password');

        // change account settings
        Route::put('account/settings/update', 'CompaniesController@update_settings');

        // company works routes
        Route::get('works',         'CompaniesController@works');           // get all company works
        Route::post('works/create', 'CompaniesController@create_work');     // ad new work
        Route::delete('works/{id}', 'CompaniesController@delete_work');     // delete a company work
    });
});
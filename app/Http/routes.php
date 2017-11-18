<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



	Route::group(['middleware' => 'auth'],function()
	{

							
		Route::group(['middleware' => 'rolewaredashboard'],function()
		{
			Route::resource('dashboard','DashboardController');

		});	

		
		Route::get('dashboarduserprofile', [
					'uses' => 'ProfilesController@dashboarduserindex'
					]);

		Route::resource('profiles','ProfilesController');

		Route::group(['middleware' => 'roleware3_4'],function()
		{
			
			Route::resource('enquirys','EnquiryController');

			Route::group(['middleware' => 'roleware2'],function()
			{
				Route::resource('mainslides','MainslideController');

			
				Route::group(['middleware' => 'roleware'],function()
				{
					Route::resource('userspannel','UserspannelController');			
				});

			});
			
		});



		
	});
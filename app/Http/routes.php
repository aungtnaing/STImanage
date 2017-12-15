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
use App\Tasks;
use App\Assigntasks;
use App\Taskissues;

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	]);

Route::get('textonly', function() {

	$your_string = '<b>By Marie Starr</b>';
	

	echo(strip_tags($your_string));
	
});

Route::group(['middleware' => 'auth'],function()
{
	Route::resource('todolists','TodolistController');
	Route::resource('tasks','TasksController');
	Route::resource('assigntasks','AssigntasksController');

	Route::resource('feedbacks','FeedbacksController');

	Route::get('feedbackissue/{taskid}', ['as' => 'feedbackissue', function ($taskid) {


		$tasks = Tasks::where('active', 1)->get();
		$ourtasks = Assigntasks::where('userid', Auth::user()->id)->get();
		
		$feedbacks = Taskissues::where('taskid', $taskid)
		->get();
		$task = Tasks::find($taskid);
		// echo $taskid;
		// echo $task;
		// die();

		return view("feedbacks.feedbackpannel")
		->with("taskid", $taskid)
		->with("tasks", $tasks)
		->with("ourtasks", $ourtasks)
		->with("task", $task)
		->with("feedbacks", $feedbacks);

	}]);

	Route::get('feedbackcreate/{taskid}', ['as' => 'feedbackcreate', function ($taskid) {

			$tasks = Tasks::where('active', 1)->get();
			$ourtasks = Assigntasks::where('userid', Auth::user()->id)->get();


			return view("feedbacks.feedbackcreate")->with('taskid', $taskid)
			->with('tasks', $tasks)
			->with('ourtasks', $ourtasks);
			
		}]);

	
	Route::group(['middleware' => 'rolewaredashboard'],function()
	{
		Route::resource('dashboard','DashboardController');

	});	

	
	Route::get('dashboarduserprofile', [
		'uses' => 'ProfilesController@dashboarduserindex'
		]);

	Route::resource('profiles','ProfilesController');

	Route::group(['middleware' => 'roleware3'],function()
	{
		
		Route::resource('enquirys','EnquiryController');
		Route::resource('mainslides','MainslideController');

		
		
	});

	Route::group(['middleware' => 'roleware4'],function()
	{
		
		Route::resource('campus','CampusController');
		
		Route::resource('campusitem','CampusitemController');


		Route::get('campusitemcreate/{campusid}', ['as' => 'campusitemcreate', function ($campusid) {

			$tasks = Tasks::where('active', 1)->get();
			$ourtasks = Assigntasks::where('userid', Auth::user()->id)->get();


			return view("campusitem.campusitemcreate")->with('campusid', $campusid)
			->with('tasks', $tasks)
			->with('ourtasks', $ourtasks);
			
		}]);

		
	});

	Route::group(['middleware' => 'roleware2'],function()
	{

		Route::resource('userspannel','UserspannelController');	
		Route::get('todolistmanager', [
			'uses' => 'TodolistController@todolistmanager'
			]);		
		

	});


	Route::group(['middleware' => 'roleware'],function()
	{
		
	});



	
});
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});



Route::get('/', 'IndexController@getIndex');

//Login Routes
Route::get('/login', 'UsersController@getLogin');
Route::post('/login', 'UsersController@login');

Route::group(array('before' => 'auth'), function() {

	//Account routes
	Route::get('/account', 'UsersController@getAccount');
	Route::get('account/wijzigen', 'UsersController@getEdit');
	Route::get('account/wijzigen/{id}', 'UsersController@getEdit');
	Route::post('account/wijzigen', 'UsersController@edit');
	Route::post('account/wijzigen/{id}', 'UsersController@edit');
	Route::post('account/wijzigen/{id}', 'UsersController@edit');
	Route::get('account/incident', 'UsersController@getShowIncident');
	Route::post('account/incident', 'UsersController@getShowIncident');

	Route::post('account/incident/bericht', 'UsersController@messages');


	Route::get('uitloggen', 'UsersController@getLogout');


	Route::get('/incident/aanmaken', 'IncidentsController@getIndex');
	Route::get('/incident/aanmaken/formulier', 'IncidentsController@getQuestions');
	Route::get('/incident/aanmaken/formulier/{id}', 'IncidentsController@getQuestions');
	Route::post('/incident/aanmaken/formulier', 'IncidentsController@questions');
	Route::post('/incident/aanmaken/formulier/{id}', 'IncidentsController@questions');
	Route::post('/incident/aanmaken/addQuestionAnswer/{id}', 'IncidentsController@addQuestionAnswer');
	Route::get('/incident/aanmaken/overige', 'IncidentsController@remainder');
	Route::get('/incident/aanmaken/saveIncident', 'IncidentsController@saveIncident');
	Route::post('/incident/aanmaken/saveIncident', 'IncidentsController@saveIncident');

});




// Login Back-end routes
Route::get('/admin', 'AdminLoginController@getIndex');
Route::post('/admin', 'AdminLoginController@index');

Route::group(array('before' => 'auth.backendaccess'), function() {
	// Dashboard routes
    //Route::get('/admin', 'AdminDashboardController@getIndex');
    Route::get('/admin/dashboard', 'AdminDashboardController@getIndex');

    // Log-out Back-end routes
    Route::get('/admin/logout', 'AdminLoginController@getLogout');

    // User routes
 	Route::get('/admin/users', 'AdminUsersController@getIndex');
	Route::get('/admin/users/edit', 'AdminUsersController@getEdit');
 	Route::get('/admin/users/edit/{id}', 'AdminUsersController@getEdit');
	Route::post('/admin/users/edit', 'AdminUsersController@edit');
	Route::post('/admin/users/edit/{id}', 'AdminUsersController@edit');
	Route::get('/admin/users/delete/{id}', 'AdminUsersController@getDelete');

	// User roles
 	Route::get('/admin/roles', 'AdminRolesController@getIndex');
    Route::get('/admin/roles/edit', 'AdminRolesController@getEdit');
    Route::get('/admin/roles/edit/{id}', 'AdminRolesController@getEdit');
    Route::post('/admin/roles/edit', 'AdminRolesController@edit');
    Route::post('/admin/roles/edit/{id}', 'AdminRolesController@edit');
    Route::get('/admin/roles/delete/{id}', 'AdminRolesController@getDelete');	

	 // Hardware routes
 	Route::get('/admin/hardware', 'AdminHardwareController@getIndex');
	Route::get('/admin/hardware/edit', 'AdminHardwareController@getEdit');
 	Route::get('/admin/hardware/edit/{id}', 'AdminHardwareController@getEdit');
	Route::post('/admin/hardware/edit', 'AdminHardwareController@edit');
	Route::post('/admin/hardware/edit/{id}', 'AdminHardwareController@edit');
	Route::get('/admin/hardware/delete/{id}', 'AdminHardwareController@getDelete');
	Route::get('/admin/hardware/software/{id}', 'AdminHardwareController@getSoftwareByHardware');

	// Software routes
	Route::get('/admin/software', 'AdminSoftwareController@getIndex');
	Route::get('/admin/software/edit', 'AdminSoftwareController@getEdit');
 	Route::get('/admin/software/edit/{id}', 'AdminSoftwareController@getEdit');
	Route::post('/admin/software/edit', 'AdminSoftwareController@edit');
	Route::post('/admin/software/edit/{id}', 'AdminSoftwareController@edit');
	Route::get('/admin/software/delete/{id}', 'AdminSoftwareController@getDelete');

	// Questions routes
	Route::get('/admin/questions', 'AdminQuestionsController@getIndex');
	Route::get('/admin/questions/edit', 'AdminQuestionsController@getEdit');
 	Route::get('/admin/questions/edit/{id}', 'AdminQuestionsController@getEdit');
	Route::post('/admin/questions/edit', 'AdminQuestionsController@edit');
	Route::post('/admin/questions/edit/{id}', 'AdminQuestionsController@edit');
	Route::get('/admin/questions/sort', 'AdminQuestionsController@getSort');
	Route::post('/admin/questions/sort', 'AdminQuestionsController@sort');
	Route::get('/admin/questions/delete/{id}', 'AdminQuestionsController@getDelete');
	
	 // Incident routes
 	Route::get('/admin/incidents', 'AdminIncidentsController@getIndex');
	Route::get('/admin/incidents/edit', 'AdminIncidentsController@getEdit');
 	Route::get('/admin/incidents/edit/{id}', 'AdminIncidentsController@getEdit');
	Route::post('/admin/incidents/edit', 'AdminIncidentsController@edit');
	Route::post('/admin/incidents/edit/{id}', 'AdminIncidentsController@edit');
	Route::get('/admin/incidents/delete/{id}', 'AdminIncidentsController@getDelete');
	Route::get('/admin/incidents/messages/', 'AdminIncidentsController@getMessages');
	Route::get('/admin/incidents/messages/{id}', 'AdminIncidentsController@getMessages');
	Route::post('/admin/incidents/messages', 'AdminIncidentsController@messages');
	Route::post('/admin/incidents/messages/{id}', 'AdminIncidentsController@messages');
	Route::post('/admin/incidents/classifications','AdminIncidentsController@classifications');
	Route::post('/admin/incidents/classifications/{id}','AdminIncidentsController@classifications');

});


<?php


// Event::listen('illuminate.query', function($query, $params, $time, $conn) 
// { 
//     Log::info(array($query, $params, $time, $conn));
// });



Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

/*
 * Auth Routes
 */


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('github', [
	'as' 	=> 'github',
	'uses'	=> 'GithubController@login'
	]);


/*
 * Project Routes
 */


Route::get('projects', [
	'as' 	=> 'projects',
	'uses'	=> 'ProjectsController@index'
	]);

Route::get('projects/create', [
	'as' 	=> 'projects_create',
	'uses'	=> 'ProjectsController@create'
	]);

Route::post('projects/create', [
	'as' 	=> 'projects_store',
	'uses'	=> 'ProjectsController@store'
	]);

Route::get('projects/{slug}', [
	'as' 	=> 'projects_show',
	'uses'	=> 'ProjectsController@show'
	]);

Route::get('projects/{slug}/edit', [
	'as' 	=> 'projects_edit',
	'uses'	=> 'ProjectsController@edit'
	]);

Route::post('projects/{slug}/edit', [
	'as' 	=> 'projects_update',
	'uses'	=> 'ProjectsController@update'
	]);

Route::post('projects/{slug}/delete', [
	'as' 	=> 'projects_update',
	'uses'	=> 'ProjectsController@destroy'
	]);


/*
 * User Routes
 */

Route::get('users/{slug}', [
	'as' 	=> 'users_show',
	'uses'	=> 'UsersController@show'
	]);

Route::get('profile/edit', [
	'as' 	=> 'users_edit',
	'uses'	=> 'UsersController@edit'
	]);

Route::post('profile/{username}/edit', [
	'as' 	=> 'users_update',
	'uses'	=> 'UsersController@update'
	]);

/*
 * User Routes
 */

Route::get('bugs', [
	'as' 	=> 'bugs',
	'uses'	=> 'bugsController@index'
	]);

Route::get('bugs/create', [
	'as' 	=> 'bugs_create',
	'uses'	=> 'BugsController@create'
	]);

Route::post('bugs/store', [
	'as' 	=> 'bugs_store',
	'uses'	=> 'BugsController@store'
	]);

Route::get('bugs/{id}', [
	'as' 	=> 'bugs_show',
	'uses'	=> 'BugsController@show'
	]);

Route::get('bugs/{id}/edit', [
	'as' 	=> 'bugs_edit',
	'uses'	=> 'BugsController@edit'
	]);

Route::post('bugs/{id}/edit', [
	'as' 	=> 'bugs_update',
	'uses'	=> 'BugsController@update'
	]);

Route::post('bugs/{id}/delete', [
	'as' 	=> 'bugs_update',
	'uses'	=> 'BugsController@destroy'
	]);


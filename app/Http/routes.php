<?php


Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('github', [
	'as' 	=> 'github',
	'uses'	=> 'GithubController@login'
	]);
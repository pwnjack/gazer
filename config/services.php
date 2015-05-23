<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => 'AKIAI7OW2ZRLEHLD6NDQ',
		'secret' => 'Ux2jowbxbYiFT53VGCtY6hCD/Pg6yLTczMVRo1MX',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'key' => '',
		'secret' => '',
	],

	'github' => [
		'client_id'  		=> '0e4e7b83d64bcbe62576',
		'client_secret' 	=> 'a3d0c56708557dce9df3574401c8bf44ef0a74ce',
		'redirect' 			=> 'http://gazer.io/github',
	],


];

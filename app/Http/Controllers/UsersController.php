<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Gazer\Users\UsersRepository as Users;

class UsersController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function show(Users $users)
	{
		# code...
	}

}

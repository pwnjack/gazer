<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Gazer\Projects\ProjectsRepository as Projects;
use Gazer\Users\UsersRepository as Users;

class ProjectsController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Users $user_repo)
	{

		$user_id = \Auth::user()->id;

		$user = $user_repo->getFromIdWithProjects($user_id);

		// return $user;

		return view('projects.index', compact('user'));

	}

	public function create(Users $users_repo)
	{
		$users = $users_repo->getAllForSelect();

		return view('projects.create', compact('users'));
	}

}

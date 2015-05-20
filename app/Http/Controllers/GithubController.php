<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gazer\Integrators\Github;
use Illuminate\Http\Request;

class GithubController extends Controller {


	public function login(Github $github, Request $request )
	{
		return $github->execute($request->has('code'), $this);
	}

	public function userHasLoggedIn()
	{
		return redirect()->to('/');
	}

}

<?php

namespace Gazer\Integrators;


use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Socialite\Contracts\Factory as Socialite;
use Gazer\Users\UsersRepository as User;

class Github {


	protected $socialite;
	protected $auth;
	protected $user;



	public function __construct(Socialite $socialite, User $user, \Auth $auth) {

		$this->socialite 	= $socialite;
		$this->auth 		= $auth;
		$this->user 		= $user;
		
	}


	public function execute($hasCode, $listener)
	{
		if ( ! $hasCode ) return $this->getAuthorizationFirst();

		$user =  $this->user->findByUsernameOrCreate($this->getGithubUser());

		\Auth::login($user, true);

		return $listener->userHasLoggedIn();


	}

	public function getGithubUser()
	{
		return $this->socialite->driver('github')->user();
	}

	public function getAuthorizationFirst()
	{
		return $this->socialite->driver('github')->redirect();
	}

}
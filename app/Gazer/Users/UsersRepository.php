<?php

namespace Gazer\Users;

use App\User;

class UsersRepository {


	public function findByUsernameOrCreate($userData)
	{

		$user = $this->findByUsername($userData->nickname);

		if($user) return $user;


		$user = $this->createUserFromGithub($userData);

		return $user;

		
	}

	public function findByUsername($username)
	{
		return User::whereUsername($username)->first();
	}

	public function createUserFromGithub($userData)
	{

		$user = new User;

		$user->email 		= $userData->email;
		$user->username 	= $userData->nickname;
		$user->fullname 	= $userData->name;
		$user->location 	= @$userData->user['location'];
		$user->bio 			= @$userData->user['bio'];
		$user->company 		= @$userData->user['company'];
		$user->avatar 		= $userData->avatar;
		$user->github_id 	= $userData->id;


		return $this->save($user);

	}

	public function save(User $user)
	{
		$user->save();

		return $user;
	}




}
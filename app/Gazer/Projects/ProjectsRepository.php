<?php

namespace Gazer\Projects;

use Gazer\Models\Projects;

class ProjectsRepository {

	public function getAllForUser($user_id)
	{
		
	}

	public function save(Projects $project)
	{
		$project->save();

		return $project;
	}

	public function getFromSlug($slug, $user_id = null)
	{

		return Projects::canSee($user_id)->where('slug', $slug)->with('users', 'creator', 'bugs')->first();

	}

}
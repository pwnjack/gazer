<?php namespace App\Events\Projects;

use App\Events\Event;

use Gazer\Models\Projects;

use Illuminate\Queue\SerializesModels;

class ProjectEdited extends Event {

	use SerializesModels;
 
	public function __construct(Projects $project)
	{
		$this->project = $project;
	}

}

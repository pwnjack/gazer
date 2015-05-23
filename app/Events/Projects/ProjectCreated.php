<?php namespace App\Events\Projects;

use App\Events\Event;

use Gazer\Models\Projects;

use Illuminate\Queue\SerializesModels;

class ProjectCreated extends Event {

	use SerializesModels;
 
	public function __construct(Projects $project)
	{
		$this->project = $project;
	}

}

<?php namespace App\Handlers\Commands\Projects;

use App\Commands\Projects\CreateProjectCommand;

use Illuminate\Queue\InteractsWithQueue;

use Event;

use App\Events\Projects\ProjectCreated;

use Gazer\Models\Projects;

use Gazer\Projects\ProjectsRepository;

use Illuminate\Support\Str;


class CreateProjectCommandHandler {

	protected $repo;

	public function __construct(ProjectsRepository $repo)
	{
		$this->repo = $repo;
	}


	public function handle(CreateProjectCommand $command)
	{
		$project = Projects::make($command->user_id, $command->title, Str::slug($command->title), $command->description, $command->start, $command->end);

		$new_project = $this->repo->save($project);

		$slug = $this->addIdToSlug($new_project);

		$this->attachUsers($new_project, $command->users);

		Event::fire(new ProjectCreated($project));

		return $slug;

	}

	public function addIdToSlug($project)
	{
		$project = Projects::find($project->id);

		$project->slug = $project->slug . '-' . $project->id;

		$project->save();

	}

	function attachUsers($project, $users)
	{
		$project = Projects::find($project->id);

		$project->users()->attach($users);
	}

}

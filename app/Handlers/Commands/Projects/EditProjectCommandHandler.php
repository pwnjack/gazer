<?php namespace App\Handlers\Commands\Projects;

use App\Commands\Projects\EditProjectCommand;

use Illuminate\Queue\InteractsWithQueue;

use Event;

use App\Events\Projects\ProjectEdited;

use Gazer\Models\Projects;

use Gazer\Projects\ProjectsRepository;

use Illuminate\Support\Str;


class EditProjectCommandHandler {

	protected $repo;

	public function __construct(ProjectsRepository $repo)
	{
		$this->repo = $repo;
	}


	public function handle(EditProjectCommand $command)
	{
		$project = Projects::edit($command->id, $command->title, Str::slug($command->title).'-'.$command->id, $command->description, $command->start, $command->end);

		$new_project = $this->repo->save($project);

		$this->syncUsers($new_project, $command->users);

		Event::fire(new ProjectEdited($project));

		return $new_project;

	}

	function syncUsers($project, $users)
	{
		$project = Projects::find($project->id);

		$project->users()->sync($users);
	}

}

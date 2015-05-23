<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\Projects\CreateProjectRequest;
use App\Http\Requests\Projects\EditProjectRequest;
use App\Events\Attachments\FileWasUploaded;

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

		return view('projects.index', compact('user'));

	}

	public function create(Users $users_repo)
	{
		$users = $users_repo->getAllForSelect();

		return view('projects.create', compact('users'));
	}

	public function store(CreateProjectRequest $request)
	{
		$project_id = $this->dispatchFrom('App\Commands\Projects\CreateProjectCommand', $request);

		flash()->success('Project was successfully created');

    	return redirect()->to('/projects');
	}

	public function show($slug, Projects $projects_repo)
	{
		$project = $projects_repo->getFromSlug($slug, \Auth::user()->id);

		$this->userHasRights($project);

		return view('projects.show', compact('project'));

	}

	public function edit($slug, Projects $projects_repo, Users $users_repo)
	{
		$project = $projects_repo->getFromSlug($slug, \Auth::user()->id);

		$users = $users_repo->getAllForSelect();

		return view('projects.edit', compact('users', 'project'));
	}

	public function update($slug, EditProjectRequest $request, Projects $projects_repo)
	{
		

		$project = $projects_repo->getFromSlug($slug, \Auth::user()->id);

		$this->userHasRights($project);

		$project_id = $this->dispatchFrom('App\Commands\Projects\EditProjectCommand', $request);


		if(count(\Request::get('attachments')) > 0) 
			{
				event(new FileWasUploaded($request, $project));
			}

		flash()->success('Project was successfully updated');

	    return redirect()->to('/projects/' . $project->slug . '/edit');

		

	}

	public function userHasRights($project)
	{
		if( ! $project )
		{
			flash()->error('The requested project does not exist, or you do not have permission to edit it.');

			return redirect()->back();

		}
	}


}

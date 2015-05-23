<?php namespace App\Commands\Projects;

use App\Commands\Command;

class CreateProjectCommand extends Command {

	public $title;
	public $user_id;
	public $description;
	public $start;
	public $end;
	public $users;


	public function __construct($title, $user_id, $description, $start, $end, $users)
	{

		$this->title 		=	$title;
		$this->user_id 		=	$user_id;
		$this->description 	=	$description;
		$this->start 		=	$start;
		$this->end 			=	$end;
		$this->users 		=	$users;
	}

}

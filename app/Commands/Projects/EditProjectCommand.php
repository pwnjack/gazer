<?php namespace App\Commands\Projects;

use App\Commands\Command;

class EditProjectCommand extends Command {

	public $id;
	public $user_id;
	public $title;
	public $description;
	public $start;
	public $end;
	public $users;
	public $attachments;


	public function __construct($id, $user_id, $title, $description, $start, $end, $users, $attachments)
	{

		$this->id 			=	$id;
		$this->user_id		=	$user_id;
		$this->title 		=	$title;
		$this->description 	=	$description;
		$this->start 		=	$start;
		$this->end 			=	$end;
		$this->users 		=	$users;
		$this->attachments 	=	$attachments;
	}

}

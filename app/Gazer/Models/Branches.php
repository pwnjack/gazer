<?php namespace Gazer\Models;

use Illuminate\Database\Eloquent\Model;

class Branches extends Model {

	public function project()
	{
		return $this->belongsTo('Gazer\Models\Projects');
	}


	public function milestones()
	{
		return $this->hasMany('Gazer\Models\Milestones');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function bugs()
	{
		return $this->morphMany('Gazer\Models\Bugs', 'buggable');
	}

	public function attachments()
	{
		return $this->morphMany('Gazer\Models\Attachments', 'attachable');
	}

}

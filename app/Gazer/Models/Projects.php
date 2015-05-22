<?php namespace Gazer\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model {

	protected $dates = ['start', 'end'];

	public function users()
	{
		return $this->belongsToMany('App\User');
	}

	public function creator()
	{
		return $this->belongsTo('App\User');
	}

	public function boards()
	{
		return $this->hasMany('Gazer\Models\Board');
	}

	public function branches()
	{
		return $this->hasMany('Gazer\Models\Branches');
	}

	public function attachments()
	{
		return $this->morphMany('Gazer\Models\Attachments', 'attachable');
	}

	public function bugs()
	{
		return $this->morphMany('Gazer\Models\Bugs', 'buggable');
	}


}

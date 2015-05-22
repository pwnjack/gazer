<?php namespace Gazer\Models;

use Illuminate\Database\Eloquent\Model;

class Milestones extends Model {

	protected $dates = ['start', 'end'];

	public function branch()
	{
		return $this->belongsTo('Gazer\Models\Branches');
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

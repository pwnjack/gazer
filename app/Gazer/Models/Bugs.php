<?php namespace Gazer\Models;

use Illuminate\Database\Eloquent\Model;

class Bugs extends Model {

	public function buggable()
	{
		return $this->morphTo();
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function attachments()
	{
		return $this->morphMany('Gazer\Models\Attachments', 'attachable');
	}

	public function status()
	{
		return $this->belongsTo('Gazer\Models\Statuses');
	}

	public function priority()
	{
		return $this->belongsTo('Gazer\Models\Priorities');
	}


}

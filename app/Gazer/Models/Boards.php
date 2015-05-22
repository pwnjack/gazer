<?php namespace Gazer\Models;

use Illuminate\Database\Eloquent\Model;

class Boards extends Model {

	protected $dates = ['start', 'end'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function project()
	{
		return $this->belongsTo('Gazer\Models\Projects');
	}

}

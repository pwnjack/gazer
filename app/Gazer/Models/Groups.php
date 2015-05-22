<?php namespace Gazer\Models;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model {

	public function user()
	{
		return $this->belongsToMany('App\User');
	}

}

<?php namespace Gazer\Models;

use Illuminate\Database\Eloquent\Model;

class Attachments extends Model {

	public function attachable()
	{
		return $this->morphTo();
	}

}

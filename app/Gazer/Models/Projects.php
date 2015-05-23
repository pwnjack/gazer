<?php namespace Gazer\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model {

	protected $dates = ['start', 'end'];
	protected $guarded = ['id', 'created_at', 'updated_at'];

	public function users()
	{
		return $this->belongsToMany('App\User', 'project_user', 'project_id', 'user_id');
		// return $this->belongsToMany('App\User', 'project_user', 'user_id', 'project_id');
	}

	public function creator()
	{
		return $this->belongsTo('App\User', 'user_id');
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

	public static function make($user_id, $title, $slug, $description, $start, $end)
	{
		$project = new static(compact('user_id', 'title', 'slug', 'description', 'start', 'end'));

        return $project;
	}

	public static function edit($id, $title, $slug, $description, $start, $end)
    {
        $project = static::find($id);

        $project->title      	= $title;
        $project->slug 			= $slug;
        $project->description   = $description;
        $project->start 		= $start;
        $project->end 			= $end;

        return $project;

    }

	public function scopeCanSee($query, $user_id)
	{
		$query->where(function($q) use($user_id){

			$q->where('public', 1)
			->orWhere(function($q) use($user_id){
				$q->whereHas('users', function($q) use($user_id) {
					$q->where('users.id', $user_id);
				});
			});

		});
	}

}

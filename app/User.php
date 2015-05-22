<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id', 'created_at', 'updated_at'];
	// protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


	public function projects()
	{
		return $this->belongsToMany('Gazer\Models\Projects', 'project_user', 'user_id', 'project_id');
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

	public function bugsOpened()
	{
		return $this->hasMany('Gazer\Models\Bugs');
	}

	public function bugsAssigned()
	{
		return $this->hasMany('Gazer\Models\Bugs', 'assignee_id');
	}

	public function groups()
	{
		return $this->belongsToMany('Gazer\Models\Groups', 'group_user', 'group_id', 'user_id');
	}

	public function friends()
	{
		return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
	}

}

<?php namespace App\Http\Requests\Projects;

use App\Http\Requests\Request;

class EditProjectRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'id' => 'required',
			'title' => 'required',
			'description' => 'required',
			'start' => 'required|date',
			'end' => 'required|date',
			'users' => 'required|array',
		];
	}

}

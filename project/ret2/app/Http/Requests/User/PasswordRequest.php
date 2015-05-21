<?php namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{

		return [
        'oldpass' => 'required',
        'pass' => 'required|same:pass2',
        'pass2' => 'required',
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}

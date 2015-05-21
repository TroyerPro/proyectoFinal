<?php namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{

		return [
        'nombre' => 'required|min:3',
        'apellidos' => 'required|min:3',
        'nif' => 'required|regex:/[0-9A-Z][0-9]{7}[A-Z]/',
        'ciudad' => 'required|min:3|regex:/^([a-zA-Z]+\s)*[a-zA-Z]+$/',
        'email' => 'required|email',
        'texto' => 'required|min:5',
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

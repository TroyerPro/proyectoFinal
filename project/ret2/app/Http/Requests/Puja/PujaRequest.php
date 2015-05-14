<?php namespace App\Http\Requests\Puja;

use Illuminate\Foundation\Http\FormRequest;

class PujaRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
          'cantidad' => 'required|regex:/^\d{1,8}(\.\d{1,2})?$/',
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

<?php namespace App\Http\Requests\Subasta;

use Illuminate\Foundation\Http\FormRequest;

class ProrrogarRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{

		return [
        'diasPro' => 'required|integer|min:1',
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

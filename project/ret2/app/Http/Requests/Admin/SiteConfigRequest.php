<?php namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SiteConfigRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
      'prorroga' => 'required|regex:/^\d{1,8}(\.\d{1,2})?$/',
      'dias_subasta' => 'required|integer|min:1',
      'inactividad' => 'required|integer|min:1',
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

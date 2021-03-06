<?php namespace App\Http\Requests\Subasta;

use Illuminate\Foundation\Http\FormRequest;
use App\Empresa;
use App\Categoria;

class SubastaRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{

		$empresa = Empresa::find(1);
	  $categoria = Categoria::select('categorias.id')->orderBy('created_at','desc')->take(1)->get();

		return [
        'nombre' => 'required|alpha_dash|min:3',
				'desc' => 'required|alpha_dash|min:15',
				'image' => 'required|image',
				'categoria' => 'required|integer|min:1|max:'.$categoria[0]->id,
				'duracion' => 'required|integer|min:1|max:'.$empresa->dias_subasta_gratis,
				'precioIni' => 'required|regex:/^\d{1,8}(\.\d{1,2})?$/',
				'metodo' => 'required',

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

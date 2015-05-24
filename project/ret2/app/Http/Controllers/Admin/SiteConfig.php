<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Empresa;
use App\Http\Requests\Admin\SiteConfigRequest;

class SiteConfig extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show()
	{
		$empresa = Empresa::find(1);
		$precio = $empresa -> precio_prorroga;
		$dias_subasta = $empresa -> dias_subasta_gratis;
		$tiempo_inactividad = $empresa -> tiempo_inactividad;
		return view('admin.configsite', compact('precio','dias_subasta','tiempo_inactividad'));
	}

	public function postEdit(SiteConfigRequest $request) {
		$empresa = Empresa::find(1);
		$precio = $_POST['prorroga'];
		$dias_subasta = $_POST['dias_subasta'];
		$tiempo_inactividad = $_POST['inactividad'];
		$empresa -> precio_prorroga = $precio;
		$empresa -> dias_subasta_gratis = $dias_subasta;
		$empresa -> tiempo_inactividad = $tiempo_inactividad;

		$empresa->save();
		$success = true;
		return view('admin.configsite', compact('precio','dias_subasta','tiempo_inactividad', 'success'));
	}

}

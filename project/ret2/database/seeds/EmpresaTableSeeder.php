<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class EmpresaTableSeeder extends Seeder {

	public function run()
	{

		\App\Empresa::create([
			'nombre' => 'RET',
	    'direccion' => 'c/Roger de Flor nº47 s.n',
	    'precio_prorroga' => '10',
	    'dias_subasta_gratis'=> '30',
	    'tiempo_inactividad' => '30',
		]);

	}

}

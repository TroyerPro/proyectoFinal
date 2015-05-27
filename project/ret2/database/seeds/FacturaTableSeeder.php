<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class FacturaTableSeeder extends Seeder {

	public function run()
	{
		\App\Factura::create([
			'fecha' => date('2015-05-27'),
			'precio'=>2,
			'id_usuario' => 2,
		]);

		\App\Factura::create([
			'fecha' => date('2015-04-20'),
			'precio'=>5,
			'id_usuario' => 3,
		]);

		\App\Factura::create([
			'fecha' => date('2015-04-20'),
			'precio'=>25,
			'id_usuario' => 3,
		]);


	}

}

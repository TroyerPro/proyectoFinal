<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class FacturaTableSeeder extends Seeder {

	public function run()
	{
		\App\Factura::create([
			'fecha' => date("2015/03/04"),
			'precio'=>25,
			'id_usuario' => 2,
		]);
		\App\Factura::create([
			'fecha' => '2015-03-04',
			'precio'=>10,
			'id_usuario' => '3',
		]);
		\App\Factura::create([
			'fecha' => '2015-03-04',
			'precio'=>5,
			'id_usuario' => '4',
		]);
		\App\Factura::create([
			'fecha' => '2015-03-04',
			'precio'=>40,
			'id_usuario' => '5',
		]);
		\App\Factura::create([
			'fecha' => '2015-03-04',
			'precio'=>12,
			'id_usuario' => '6',
		]);
		//TestDummy::times(5)->create('App\Factura');

	}

}

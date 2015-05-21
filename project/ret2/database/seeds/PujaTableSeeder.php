<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class PujaTableSeeder extends Seeder {

	public function run()
	{
		\App\Puja::create([
			'cantidad' => 70,
			'fecha' => date('2015-03-01'),
			'id_subasta'=> '1',
			'id_usuario' => '1',
			'puja_auto' => false,
		]);
		\App\Puja::create([
			'cantidad' => 50,
			'fecha' => date('2015-02-19'),
			'id_subasta'=> '2',
			'id_usuario' => '1',
			'puja_auto' => false,
		]);

		\App\Puja::create([
			'cantidad' => 124,
			'fecha' => date('2015-05-19'),
			'id_subasta'=> '3',
			'id_usuario' => '1',
			'puja_auto' => true,
		]);


	}

}

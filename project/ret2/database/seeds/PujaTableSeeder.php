<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class PujaTableSeeder extends Seeder {

	public function run()
	{
		\App\Puja::create([
			'cantidad' => 25,
			'fecha' => date('2015-03-04'),
			'id_subasta'=> '1',
			'id_usuario' => '3',
			'puja_auto' => false,
		]);
		\App\Puja::create([
			'cantidad' => 10,
			'fecha' => date('2015-05-20'),
			'id_subasta'=>'2',
			'id_usuario' => '2',
			'puja_auto' => false,
		]);
		\App\Puja::create([
			'cantidad' => 5,
			'fecha' => date('2015-01-19'),
			'id_subasta'=>'3',
			'id_usuario' => '5',
			'puja_auto' => false,
		]);
		\App\Puja::create([
			'cantidad' => 40,
			'fecha' => date('2015-03-08'),
			'id_subasta'=>'4',
			'id_usuario' => '6',
			'puja_auto' => false,
		]);
		\App\Puja::create([
			'cantidad' => 12,
			'fecha' => date('2014-10-11'),
			'id_subasta'=>'5',
			'id_usuario' => '7',
			'puja_auto' => false,
		]);

	}

}

<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class PujaTableSeeder extends Seeder {

	public function run()
	{

		//#######################################################
		//##                     Acabadas                      ##
		//#######################################################

		\App\Puja::create([
			'cantidad' => 2,
			'fecha' => date('2015-05-20'),
			'id_subasta'=> '1',
			'id_usuario' => '3',
			'puja_auto' => false,
		]);

		\App\Puja::create([
			'cantidad' => 5,
			'fecha' => date('2015-04-12'),
			'id_subasta'=> '2',
			'id_usuario' => '2',
			'puja_auto' => false,
		]);

		\App\Puja::create([
			'cantidad' => 22,
			'fecha' => date('2015-04-05'),
			'id_subasta'=> '3',
			'id_usuario' => '5',
			'puja_auto' => false,
		]);

		\App\Puja::create([
			'cantidad' => 25,
			'fecha' => date('2015-04-19'),
			'id_subasta'=> '3',
			'id_usuario' => '4',
			'puja_auto' => false,
		]);

		//#######################################################
		//##                    No acabadas                    ##
		//#######################################################

		\App\Puja::create([
			'cantidad' => 90,
			'fecha' => date('2015-05-12'),
			'id_subasta'=> '4',
			'id_usuario' => '4',
			'puja_auto' => false,
		]);

		\App\Puja::create([
			'cantidad' => 115,
			'fecha' => date('2015-05-20'),
			'id_subasta'=> '4',
			'id_usuario' => '5',
			'puja_auto' => false,
		]);

		\App\Puja::create([
			'cantidad' => 120,
			'fecha' => date('2015-05-25'),
			'id_subasta'=> '4',
			'id_usuario' => '4',
			'puja_auto' => false,
		]);

		//cambiar fechas
		\App\Puja::create([
			'cantidad' => 260,
			'fecha' => date('2015-05-03'),
			'id_subasta'=> '5',
			'id_usuario' => '3',
			'puja_auto' => true,
		]);

		\App\Puja::create([
			'cantidad' => 12,
			'fecha' => date('2015-05-27'),
			'id_subasta'=> '8',
			'id_usuario' => '2',
			'puja_auto' => false,
		]);

		\App\Puja::create([
			'cantidad' => 3,
			'fecha' => date('2015-04-11'),
			'id_subasta'=> '9',
			'id_usuario' => '4',
			'puja_auto' => false,
		]);

		\App\Puja::create([
			'cantidad' => 25,
			'fecha' => date('2015-03-22'),
			'id_subasta'=> '11',
			'id_usuario' => '2',
			'puja_auto' => false,
		]);

		\App\Puja::create([
			'cantidad' => 27,
			'fecha' => date('2015-05-10'),
			'id_subasta'=> '11',
			'id_usuario' => '5',
			'puja_auto' => false,
		]);

		\App\Puja::create([
			'cantidad' => 30,
			'fecha' => date('2015-05-18'),
			'id_subasta'=> '11',
			'id_usuario' => '3',
			'puja_auto' => false,
		]);

		\App\Puja::create([
			'cantidad' => 6,
			'fecha' => date('2015-05-15'),
			'id_subasta'=> '12',
			'id_usuario' => '2',
			'puja_auto' => false,
		]);

		\App\Puja::create([
			'cantidad' => 20,
			'fecha' => date('2015-04-18'),
			'id_subasta'=> '13',
			'id_usuario' => '4',
			'puja_auto' => false,
		]);

		\App\Puja::create([
			'cantidad' => 12,
			'fecha' => date('2015-04-30'),
			'id_subasta'=> '15',
			'id_usuario' => '2',
			'puja_auto' => false,
		]);

		\App\Puja::create([
			'cantidad' => 13,
			'fecha' => date('2015-05-02'),
			'id_subasta'=> '15',
			'id_usuario' => '4',
			'puja_auto' => false,
		]);

		\App\Puja::create([
			'cantidad' => 17,
			'fecha' => date('2015-05-05'),
			'id_subasta'=> '15',
			'id_usuario' => '2',
			'puja_auto' => false,
		]);

		\App\Puja::create([
			'cantidad' => 18,
			'fecha' => date('2015-05-15'),
			'id_subasta'=> '15',
			'id_usuario' => '3',
			'puja_auto' => false,
		]);

	}

}

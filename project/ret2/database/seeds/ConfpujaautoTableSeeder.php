<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ConfpujaautoTableSeeder extends Seeder {

	public function run()
	{
		\App\Confpujaauto::create([
			'max_puja' => 300,
			'incrementar' => 1,
			'id_usuario' => 1,
			'id_puja' => 3,
		]);

		//TestDummy::times(3)->create('App\Confpujaauto');

	}

}

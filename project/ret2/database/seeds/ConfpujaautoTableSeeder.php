<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ConfpujaautoTableSeeder extends Seeder {

	public function run()
	{
		\App\Confpujaauto::create([
			'max_puja' => 700,
			'incrementar' => 10,
			'id_usuario' => 3,
			'id_puja' => 8,
		]);

	}

}

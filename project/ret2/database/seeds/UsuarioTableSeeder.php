<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UsuarioTableSeeder extends Seeder {

	public function run()
	{

		TestDummy::times(5)->create('App\Usuario');

	}

}

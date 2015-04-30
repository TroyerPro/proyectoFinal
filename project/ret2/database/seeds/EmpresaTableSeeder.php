<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class EmpresaTableSeeder extends Seeder {

	public function run()
	{

		TestDummy::times(1)->create('App\Empresa');

	}

}

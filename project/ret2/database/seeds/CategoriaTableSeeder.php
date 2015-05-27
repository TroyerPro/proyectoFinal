<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class CategoriaTableSeeder extends Seeder {

	public function run()
	{

		\App\Categoria::create([
			'nombre' => 'Moda',
			'descripcion' => 'Objetos de moda',
		]);
		\App\Categoria::create([
			'nombre' => 'Electrónica',
			'descripcion' => 'Objetos electronicos',
		]);
		\App\Categoria::create([
			'nombre' => 'Casa y jardín',
			'descripcion' => 'Cosas para casa y jardín',
		]);
		\App\Categoria::create([
			'nombre' => 'Motor: Recambios y accesorios',
			'descripcion' => 'Recambios y accesorios para vehiculo',
		]);
		\App\Categoria::create([
			'nombre' => 'Deportes y Ocio',
			'descripcion' => 'Cosas de deporte y ocio',
		]);

	}

}

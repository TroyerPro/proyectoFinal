<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class SubastaTableSeeder extends Seeder {

	public function run()
	{

		\App\Subasta::create([
			'id_user_vendedor' => "2",
			'id_factura' => "1",
			'id_categoria'=> "1",
			'nombre' => 'Mochila',
			'descripcion' => 'Mochila negra, con dos asas para llevar en la espalda',
			'metodo_pago' => 'Tarjeta',
			'metodo_envio' => 'Servicio postal publico',
			'estado_subasta' =>true,
			'estado' => 'Nuevo',
			'fecha_final' => date('2015-03-04'),
			'fecha_inicio' => date('2015-02-04'),
			'fecha_prorroga' => date('2015-03-03'),
			'precio_inicial' => 5,
			'precio_actual' => 25,
			'imagen' => "sandia.jpg",
			'puja_ganadora' => 1
		]);

		\App\Subasta::create([
			'nombre' => 'Estuche',
		  'descripcion' => 'Estuche azul con cremallera',
			'metodo_pago' => 'PayPal',
			'metodo_envio' => 'Servicio postal publico',
			'estado_subasta' =>true,
			'estado' => 'Usado',
			'fecha_final' => '2015-05-20',
			'fecha_inicio' => '2015-04-20',
			'fecha_prorroga' => '2015-05-19',
			'precio_inicial' => 1,
			'precio_actual' => 10,
			'imagen' => "sandia.jpg",
			'puja_ganadora' => 2,
			'id_user_vendedor' => '3',
			'id_categoria'=>'2',
			'id_factura' => '2',
		]);

		\App\Subasta::create([
			'nombre' => 'Boli',
			'descripcion' => 'Boligrafo azul precintado',
			'metodo_pago' => 'Efectivo',
			'metodo_envio' => 'Servicio postal publico',
			'estado_subasta' =>true,
			'estado' => 'Nuevo',
			'fecha_final' => '2015-01-19',
			'fecha_inicio' => '2014-12-19',
			'fecha_prorroga' => '2015-01-18',
			'precio_inicial' => 1,
			'precio_actual' => 5,
			'imagen' => "sandia.jpg",
			'puja_ganadora' => 3,
			'id_user_vendedor' => '4',
			'id_categoria'=>'3',
			'id_factura' => '3',
		]);

		\App\Subasta::create([
			'nombre' => 'Ratón',
			'descripcion' => 'Ratón negro antiguo, con bola',
			'metodo_pago' => 'PayPal',
			'metodo_envio' => 'Servicio postal publico',
			'estado_subasta' =>true,
			'estado' => 'Gastado',
			'fecha_final' => '2015-03-08',
			'fecha_inicio' => '2015-02-08',
			'fecha_prorroga' => '2015-03-07',
			'precio_inicial' => 10,
			'precio_actual' => 40,
			'imagen' => "sandia.jpg",
			'puja_ganadora' => 4,
			'id_user_vendedor' => '5',
			'id_categoria'=>'4',
			'id_factura' => '4',

		]);

		\App\Subasta::create([
			'nombre' => 'Teclado',
			'descripcion' => 'Teclado con todas sus teclas',
			'metodo_pago' => 'Tarjeta',
			'metodo_envio' => 'Servicio postal publico',
			'estado_subasta' =>true,
			'estado' => 'Usado',
			'fecha_final' => '2014-10-11',
			'fecha_inicio' => '2014-09-11',
			'fecha_prorroga' => '2014-10-10',
			'estado_subasta' =>true,
			'precio_inicial' => 5,
			'precio_actual' => 12,
			'imagen' => "sandia.jpg",
			'puja_ganadora' => 5,
			'id_categoria'=>'1',
			'id_user_vendedor' => '6',
			'id_factura' => '1',
		]);
		//TestDummy::times(10)->create('App\Subasta');

	}

}

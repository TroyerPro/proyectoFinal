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
			'estado_subasta' =>false,
			'estado' => 'Nuevo',
			'fecha_final' => date('2015-03-04'),
			'fecha_inicio' => date('2015-02-04'),
			'precio_inicial' => 5,
			'precio_actual' => 25,
			'imagen' => "mochila.png",
			'puja_ganadora' => 1
		]);

		\App\Subasta::create([
			'nombre' => 'Estuche',
		  'descripcion' => 'Estuche azul con cremallera',
			'metodo_pago' => 'PayPal',
			'metodo_envio' => 'Servicio postal publico',
			'estado_subasta' =>false,
			'estado' => 'Usado',
			'fecha_final' => date('2015-05-20'),
			'fecha_inicio' => date('2015-04-20'),
			'precio_inicial' => 1,
			'precio_actual' => 10,
			'imagen' => "estuche.png",
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
			'estado_subasta' =>false,
			'estado' => 'Nuevo',
			'fecha_final' => date('2015-01-19'),
			'fecha_inicio' => date('2014-12-19'),
			'precio_inicial' => 1,
			'precio_actual' => 5,
			'imagen' => "boli.png",
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
			'estado_subasta' =>false,
			'estado' => 'Gastado',
			'fecha_final' => date('2015-03-08'),
			'fecha_inicio' => date('2015-02-08'),
			'precio_inicial' => 10,
			'precio_actual' => 40,
			'imagen' => "raton.png",
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
			'fecha_final' => date('2014-10-11'),
			'fecha_inicio' => date('2014-09-11'),
			'estado_subasta' =>false,
			'precio_inicial' => 5,
			'precio_actual' => 12,
			'imagen' => "teclado.png",
			'puja_ganadora' => 5,
			'id_categoria'=>'1',
			'id_user_vendedor' => '6',
			'id_factura' => '1',
		]);


				\App\Subasta::create([
					'nombre' => 'acabaHoy',
					'descripcion' => 'Test 1 que acaba a las 7',
					'metodo_pago' => 'Tarjeta',
					'metodo_envio' => 'Servicio postal publico',
					'estado_subasta' =>true,
					'estado' => 'Nuevo',
					'fecha_final' => date('2015-05-20 19:00:00'),
					'fecha_inicio' => date('2015-04-20'),
					'estado_subasta' =>true,
					'precio_inicial' => 5,
					'precio_actual' => 12,
					'imagen' => "test1.png",
					'id_categoria'=>'1',
					'id_user_vendedor' => '2',
				]);

				\App\Subasta::create([
					'nombre' => 'acabaJueves',
					'descripcion' => 'Test 2 que acaba el jueves a las 7',
					'metodo_pago' => 'Tarjeta',
					'metodo_envio' => 'Servicio postal publico',
					'estado_subasta' =>true,
					'estado' => 'Nuevo',
					'fecha_final' => date('2015-05-21 19:00:00'),
					'fecha_inicio' => date('2015-04-21'),
					'estado_subasta' =>true,
					'precio_inicial' => 5,
					'precio_actual' => 12,
					'imagen' => "test2.png",
					'id_categoria'=>'1',
					'id_user_vendedor' => '2',
				]);

				\App\Subasta::create([
					'nombre' => 'acabaViernes',
					'descripcion' => 'Test 3 que acaba el viernes a las 7',
					'metodo_pago' => 'Tarjeta',
					'metodo_envio' => 'Servicio postal publico',
					'estado_subasta' =>true,
					'estado' => 'Nuevo',
					'fecha_final' => date('2015-05-22 19:00:00'),
					'fecha_inicio' => date('2015-04-22'),
					'estado_subasta' =>true,
					'precio_inicial' => 5,
					'precio_actual' => 12,
					'imagen' => "test3.png",
					'id_categoria'=>'1',
					'id_user_vendedor' => '2',
				]);
		//TestDummy::times(10)->create('App\Subasta');

	}

}

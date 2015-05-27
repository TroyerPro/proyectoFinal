
<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class EvalusuarioTableSeeder extends Seeder {

	public function run()
	{

		App\Evalusuarios::create([
	      'id_user_evaluador' => 3,
	      'id_user_evaluado' => 2,
	      'id_rating' => 5,
	      'comentario' => "Todo Correcto, vendedor recomendado",
				'vendedor'=> true,
				'id_subasta'=>1
	  ]);

		App\Evalusuarios::create([
	      'id_user_evaluador' => 2,
	      'id_user_evaluado' => 3,
	      'id_rating' => 3,
	      'comentario' => "Rapido pero con el embalaje dañado",
				'vendedor'=> true,
				'id_subasta'=>2
	  ]);

		App\Evalusuarios::create([
	      'id_user_evaluador' => 4,
	      'id_user_evaluado' => 3,
	      'id_rating' => 4,
	      'comentario' => "Difícil comunicación, pero todo ok",
				'vendedor'=> true,
				'id_subasta'=>3
	  ]);

		App\Evalusuarios::create([
	      'id_user_evaluador' => 2,
	      'id_user_evaluado' => 3,
	      'id_rating' => 5,
	      'comentario' => "Todo Correcto, comprador recomendado",
				'vendedor'=> false,
				'id_subasta'=>1
	  ]);

		App\Evalusuarios::create([
				'id_user_evaluador' => 3,
				'id_user_evaluado' => 1,
				'id_rating' => 4,
				'comentario' => "Todo correcto",
				'vendedor'=> false,
				'id_subasta'=>2
		]);

		App\Evalusuarios::create([
				'id_user_evaluador' => 3,
				'id_user_evaluado' => 4,
				'id_rating' => 1,
				'comentario' => "Imposible comunicar con él",
				'vendedor'=> false,
				'id_subasta'=>3
		]);


	}

}

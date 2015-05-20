
<?php

use Illuminate\Database\Seeder;
use App\Rating;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class RatingTableSeeder extends Seeder {

  public function run()
  {

    \App\Rating::create([
      'valor'=>1 ,
      'descripcion'=>'Muy malo'
    ]);

    \App\Rating::create([
      'valor'=>2 ,
      'descripcion'=>'Malo'
    ]);

    \App\Rating::create([
      'valor'=>3 ,
      'descripcion'=>'Normal'
    ]);

    \App\Rating::create([
      'valor'=>4 ,
      'descripcion'=>'Bueno'
    ]);

    \App\Rating::create([
      'valor'=>5 ,
      'descripcion'=>'Muy bueno'
    ]);

  }

}


<?php

use Illuminate\Database\Seeder;
use App\Rating;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class RatingTableSeeder extends Seeder {

  public function run()
  {

    \App\Rating::create(['valor'=>10 ,'descripcion'=>'descripcion rating']);

  }

}

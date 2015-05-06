<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
    public function run()
    {
		Model::unguard();

        // Add calls to Seeders here
        $this->call('UsersTableSeeder');
    		$this->call('LanguagesTableSeeder');
    		$this->call('ArticleCategoriesTableSeeder');
    		$this->call('ArticlesTableSeeder');
    		$this->call('PhotoAlbumsTableSeeder');
        $this->call('PhotosTableSeeder');
        $this->call('VideoAlbumsTableSeeder');
        $this->call('VideosTableSeeder');
        //########################################
        $this->call('EmpresaTableSeeder');
        $this->call('CategoriaTableSeeder');
      //  $this->call('UsuarioTableSeeder');
        $this->call('SubastaTableSeeder');
        $this->call('PujaTableSeeder');
        $this->call('RatingTableSeeder');
        $this->call('EvalusuarioTableSeeder');
        $this->call('FacturaTableSeeder');
        $this->call('ConfpujaautoTableSeeder');
        $this->call('ChatusuariosTableSeeder');
        $this->call('LineaChatTableSeeder');




    }

}

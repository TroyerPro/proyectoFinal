<?php
use Illuminate\Database\Seeder;
use App\Language;

class LanguagesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('languages')->delete();

        $language = new Language();
        $language->name = 'English';
        $language->lang_code = 'en';
        $language->icon = "icon_flag_gb.gif";
        $language->save();

        $language = new Language();
        $language->name = 'Español';
        $language->lang_code = 'es';
        $language->icon = "icon_flag_es.gif";
        $language->save();
    }

}

<?php

use College\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aboutPage = new Page();
        $aboutPage->slug = 'about';
        $aboutPage->status = 'active';
        $aboutPage->translateOrNew('kg')->title = 'Биз жөнүндө';
        $aboutPage->translateOrNew('ru')->title = 'О нас';
        $aboutPage->translateOrNew('kg')->content = str_random(500);
        $aboutPage->translateOrNew('ru')->content = str_random(500);
        $aboutPage->save();
    }
}

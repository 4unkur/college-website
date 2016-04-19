<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use College\News;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        foreach (range(0, 100) as $i) {
            $news = new News();
            $string = 'qwertyuiopjsdfbaksjdvxcnvzdfkhowialsdfasjdjvbzxcnvbjasdhdfqhwfjasdlfasldjfpoqwifasvbxc';
            $title = substr(str_shuffle($string), 0, 10);
            $news->slug = str_slug($title);
            $status = ['active', 'inactive'];
            $news->status = $status[rand(0,1)];
            foreach (config('laravellocalization.supportedLocales') as $locale => $language)
            {
                $news->translateOrNew($locale)->title = $title;
            }
            $news->save();
        }

        Model::reguard();
    }
}

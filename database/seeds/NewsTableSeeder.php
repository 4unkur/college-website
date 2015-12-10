<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        College\News::truncate();

        for ($i = 0; $i < 30; $i++) {
            College\News::create([
                'title' => $faker->unique()->sentence(2),
                'body' => $faker->paragraphs(10, true),
                'status' => 'active',
            ]);
        }
    }
}

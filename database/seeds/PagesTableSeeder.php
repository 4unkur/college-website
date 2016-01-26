<?php

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

        $faker = Faker\Factory::create();

        College\Page::truncate();

        for ($i = 0; $i < 30; $i++) {
            College\Page::create([
                'title' => $faker->unique()->sentence(2),
                'content' => $faker->paragraphs(10, true),
                'status' => 'active',
            ]);
        }
    }
}
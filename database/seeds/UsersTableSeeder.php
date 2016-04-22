<?php

use College\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(['Aman', 'Kanat', 'Murat', 'Orozbek', 'Nurtilek', 'Toktobay'] as $name) {
            $user = new User();
            $user->first_name = $name;
            $user->last_name = str_random();
            $user->slug = str_slug($user->first_name . '-' . $user->last_name);
            $user->type = 'student';
            $user->email = $name . '@gmail.com';
            $user->birth_date = date('Y-m-d');
            $user->phone = random_int(8, 12);
            $user->translateOrNew('ru')->education = str_random(20);
            $user->translateOrNew('kg')->education = str_random(20);
            $user->translateOrNew('ru')->job = str_random(10);
            $user->translateOrNew('kg')->job = str_random(10);
            $user->translateOrNew('ru')->bio = str_random(500);
            $user->translateOrNew('kg')->bio = str_random(500);
            $user->status = 'active';
            $user->save();
        }
    }
}

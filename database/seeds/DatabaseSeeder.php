<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use College\Page;

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
            $aboutPage = new Page();
            $aboutPage->slug = 'about';
            $aboutPage->status = 'active';
            $aboutPage->translateOrNew('kg')->title = 'Биз жөнүндө';
            $aboutPage->translateOrNew('ru')->title = 'О нас';
            $aboutPage->translateOrNew('kg')->content = 'Nam eget dui. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Donec vitae sapien ut libero venenatis faucibus. Ut id nisl quis enim dignissim sagittis.

In turpis. Phasellus gravida semper nisi. Fusce fermentum odio nec arcu. Sed mollis, eros et ultrices tempus, mauris ipsum aliquam libero, non adipiscing dolor urna a orci. Phasellus magna.';
            $aboutPage->translateOrNew('ru')->content = 'Nam eget dui. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Donec vitae sapien ut libero venenatis faucibus. Ut id nisl quis enim dignissim sagittis.

In turpis. Phasellus gravida semper nisi. Fusce fermentum odio nec arcu. Sed mollis, eros et ultrices tempus, mauris ipsum aliquam libero, non adipiscing dolor urna a orci. Phasellus magna.';
            $aboutPage->save();
        }

        Model::reguard();
    }
}

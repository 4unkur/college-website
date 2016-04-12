<?php

namespace College\Providers;

use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $adminMenuItems = [
            ['title' => 'Home', 'url' => route('admin.dashboard'), 'icon' => 'home'],
            ['title' => 'News', 'url' => '#', 'icon' => 'newspaper-o', 'children' => [
                    ['title' => 'Add News entry', 'url' => route('admin.news.create'), 'icon' => 'plus-square'],
                    ['title' => 'List of News', 'url' => route('admin.news.index'), 'icon' => 'list'],
                ],
            ],
            ['title' => 'Users', 'url' => '#', 'icon' => 'users', 'children' => [
                    ['title' => 'Add User', 'url' => '#', 'icon' => 'user-plus'],
                    ['title' => 'Users', 'url' => '#', 'icon' => 'list'],
                ],
            ],
        ];

        view()->share('adminMenu', $adminMenuItems);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

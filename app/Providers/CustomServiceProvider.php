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
            ['title' => 'Home', 'route' => 'admin.dashboard', 'icon' => 'home'],
            ['title' => 'News', 'route' => '#', 'icon' => 'newspaper-o', 'children' => [
                    ['title' => 'Add News entry', 'route' => 'admin.news.create', 'icon' => 'plus-square'],
                    ['title' => 'List of News', 'route' => 'admin.news.index', 'icon' => 'list'],
                ],
            ],
            ['title' => 'Users', 'route' => '#', 'icon' => 'users', 'children' => [
                    ['title' => 'Add User', 'route' => '#', 'icon' => 'user-plus'],
                    ['title' => 'Users', 'route' => '#', 'icon' => 'list'],
                ],
            ],
            ['title' => 'Pages', 'route' => '#', 'icon' => 'file-text-o', 'children' => [
                    ['title' => 'Add Page', 'route' => 'admin.page.create', 'icon' => 'plus-square'],
                    ['title' => 'Page list', 'route' => 'admin.page.index', 'icon' => 'list'],
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

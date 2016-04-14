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
            ['title' => trans('p.home'), 'route' => 'admin.dashboard', 'icon' => 'home'],
            ['title' => trans('p.news'), 'route' => '#', 'icon' => 'newspaper-o', 'children' => [
                    ['title' => trans('p.add'), 'route' => 'admin.news.create', 'icon' => 'plus-square'],
                    ['title' => trans('p.list'), 'route' => 'admin.news.index', 'icon' => 'list'],
                ],
            ],
            ['title' => trans('p.users'), 'route' => '#', 'icon' => 'users', 'children' => [
                    ['title' => trans('p.add'), 'route' => 'admin.user.create', 'icon' => 'user-plus'],
                    ['title' => trans('p.list'), 'route' => 'admin.user.index', 'icon' => 'list'],
                ],
            ],  
            ['title' => trans('p.pages'), 'route' => '#', 'icon' => 'file-text-o', 'children' => [
                    ['title' => trans('p.add'), 'route' => 'admin.page.create', 'icon' => 'plus-square'],
                    ['title' => trans('p.list'), 'route' => 'admin.page.index', 'icon' => 'list'],
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

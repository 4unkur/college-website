<?php

namespace College\Providers;

use College\News;
use College\Page;
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
        view()->composer('admin.sidebar', function ($view) {
            $view->with('adminMenu', [
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
            ]);
        });

        view()->composer('front.partials.menu', function($view) {
            $view->with('menu', [
                ['title' => trans('p.home'), 'route' => 'index'],
                ['title' => trans('p.news'), 'route' => 'news.index'],
                ['title' => trans('p.users'), 'route' => 'user.index'],
            ]);
        });

        view()->composer('front.news.block-random', function($view) {
            $news = News::latest()->limit(4)->get();
            $random = $news->shift();
            $view->with('randomNews', $random)->with('latestNews', $news);
        });
        
        view()->composer('front.partials.footer', function($view) {
            $view->with('aboutPage', Page::where('slug', 'about')->first());
        });
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

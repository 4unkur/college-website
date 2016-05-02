<?php

namespace College\Providers;

use Auth;
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
                ['title' => trans('p.videocourses'), 'route' => '#', 'icon' => 'play-circle', 'children' => [
                    ['title' => trans('p.add'), 'route' => 'admin.videocourse.create', 'icon' => 'plus-square'],
                    ['title' => trans('p.list'), 'route' => 'admin.videocourse.index', 'icon' => 'list'],
                ],
                ],
                ['title' => trans('p.examresults'), 'route' => 'admin.examresult.index', 'icon' => 'check-square-o'],
                ['title' => trans('p.import'), 'route' => '#', 'icon' => 'database', 'children' => [
                    ['title' => trans('p.add'), 'route' => 'admin.import.index', 'icon' => 'plus-square'],
                    ['title' => trans('p.import_examresults_br'), 'route' => 'admin.import.examresult', 'icon' => 'check-square-o'],
                ],
                ],
            ]);
        });

        view()->composer('front.partials.menu', function($view) {
            $items = [
                ['title' => trans('p.home'), 'route' => 'index'],
                ['title' => trans('p.news'), 'route' => 'news.index'],
                ['title' => trans('p.videocourses'), 'route' => 'videocourse.index'],
            ];

            if (Auth::check()) {
//                $items[] = ['title' => trans('p.users'), 'route' => 'user.index'];
                $items[] = ['title' => trans('p.staff'), 'route' => 'staff.index'];
                $items[] = ['title' => trans('p.students'), 'route' => 'student.index'];
                $user = Auth::user();
                if ('student' == $user->type && $user->result()->first()) {
                    $items[] = ['title' => trans('p.examresults'), 'route' => 'examresult.show', 'param' => $user->email];
                }
            }

            $view->with('menu', $items);
        });

        view()->composer('front.news.block-random', function($view) {
            $news = News::where('status', 'active')->orderByRaw('RAND()')->limit(4)->get();
            $random = $news->shift();
            $view->with('randomNewsEntry', $random)->with('randomNews', $news);
        });

        view()->composer('front.index', function($view) {
            $view->with('latestNews', News::where('status', 'active')->latest()->limit(2)->get());
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

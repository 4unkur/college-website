<?php

namespace College\Providers;

use College\Recipe;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Recipe::creating(function($recipe) {
            $recipe->user_id = \Auth::id();
            $recipe->image = $recipe->image->getClientOriginalName();
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

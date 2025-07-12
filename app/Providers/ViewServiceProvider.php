<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('partials.header', function ($view) {
            $view->with('categories', Category::withCount('articles')->get());
        });
    }
}
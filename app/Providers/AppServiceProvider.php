<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['components.header', 'components.footer'], function ($view) {
            $headerMenu = Menu::query()->where('slug', 'header-menu')
                ->with(['activeItems'])
                ->first();

            $footerMenu = Menu::query()->where('slug', 'footer-menu')
                ->with(['activeItems'])
                ->first();

            $view->with([
                'headerMenu' => $headerMenu,
                'footerMenu' => $footerMenu,
            ]);
        });
    }
}

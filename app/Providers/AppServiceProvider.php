<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Actions\AttemptToAuthenticate;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'front.contact',
            'front2.contact',
        ], function ($view) {
            $view->with('setting', Settings::first());
        });
    }
}

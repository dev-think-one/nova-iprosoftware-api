<?php

namespace NovaIprosoftwareApi;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Http\Middleware\Authenticate;
use Laravel\Nova\Nova;
use NovaIprosoftwareApi\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            //
        });
    }

    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Nova::router(
            ['nova', Authenticate::class, Authorize::class],
            'iprosoftware-api'
        )
            ->group(__DIR__.'/../routes/inertia.php');

        Route::middleware(['nova', Authorize::class])
             ->prefix('nova-vendor/iprosoftware-api')
             ->group(__DIR__.'/../routes/api.php');
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

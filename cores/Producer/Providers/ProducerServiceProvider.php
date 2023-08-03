<?php

namespace Producer\Providers;

use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ProducerServiceProvider extends ServiceProvider
{
    protected $namespace = 'Producer\\';

    public function register()
    {
        $rootPath = base_path('cores/Producer/');
        $this->mergeConfigFrom($rootPath . 'config.php', 'producer');

        Route::prefix('producers')
            ->namespace($this->namespace)
            ->middleware(['web',HandleInertiaRequests::class])
            ->group($rootPath . 'router.php');
    }

    public function boot()
    {
        //
    }
}

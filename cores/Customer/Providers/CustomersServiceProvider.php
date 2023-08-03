<?php

namespace Customer\Providers;

use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CustomersServiceProvider extends ServiceProvider
{
    protected $namespace = 'Customer\\';

    public function register()
    {
        $rootPath = base_path('cores/Customer/');
        $this->mergeConfigFrom($rootPath . 'config.php', 'customer');
        $this->loadMigrationsFrom([$rootPath . 'DB/migrations']);

        Route::prefix('customers')
            ->namespace($this->namespace)
            ->middleware(['web',HandleInertiaRequests::class])
            ->group($rootPath . 'router.php');
    }

    public function boot()
    {
        //
    }
}

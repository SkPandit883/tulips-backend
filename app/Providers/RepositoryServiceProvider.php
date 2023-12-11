<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Interfaces\AuthInterface;
use App\Repository\Interfaces\HomeInterface;
use App\Repository\Implementations\AuthRepository;
use App\Repository\Implementations\HomeRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(HomeInterface::class,HomeRepository::class);
        $this->app->singleton(AuthInterface::class,AuthRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

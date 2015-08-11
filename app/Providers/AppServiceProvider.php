<?php

namespace App\Providers;

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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when('App\Http\Controllers\UserController')
            ->needs('App\Domain\Contract\Crudable')
            ->give('App\Domain\Repositories\UserRepository');
        $this->app->when('App\Http\Controllers\UserController')
            ->needs('App\Domain\Contract\Paginable')
            ->give('App\Domain\Repositories\UserRepository');
        $this->app->when('App\Http\Controllers\UserController')
            ->needs('App\Domain\Contract\Searchable')
            ->give('App\Domain\Repositories\UserRepository');
    }
}

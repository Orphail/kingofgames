<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Parameter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('Parameter',new Parameter());
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

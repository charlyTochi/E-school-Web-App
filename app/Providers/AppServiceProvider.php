<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Illuminate\Database\Schema\Builder;
=======

>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
<<<<<<< HEAD
		Builder::defaultStringLength(191);
=======
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
    }
}

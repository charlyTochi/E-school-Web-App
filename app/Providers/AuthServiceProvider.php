<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
<<<<<<< HEAD
        'App\Model' => 'App\Policies\ModelPolicy',
=======
        // 'App\Model' => 'App\Policies\ModelPolicy',
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
<<<<<<< HEAD
        Passport::routes();
=======

        Passport::routes();

>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
        //
    }
}

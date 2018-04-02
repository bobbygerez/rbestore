<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Role\RoleInterface;
use App\Repo\Role\RoleRepository;
use App\Http\Controllers\Role\GlobalAdminController;


class RoleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->when(GlobalAdminController::class)
          ->needs(RoleInterface::class)
          ->give(GlobalAdminRepository::class);
    }
}

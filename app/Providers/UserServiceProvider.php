<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\User\UserInterface;
use App\Repo\User\AdminRepository;
use App\Repo\User\UserRepository;

use App\Http\Controllers\User\AdminUserController;
use App\Http\Controllers\API\UserController;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(AdminUserController::class)
          ->needs(UserInterface::class)
          ->give(AdminRepository::class);

        $this->app->when(UserController::class)
          ->needs(UserInterface::class)
          ->give(UserRepository::class);

    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Item\ItemInterface;
use App\Repo\Item\ItemRepository;

use App\Http\Controllers\API\APIItemsController;
use App\Http\Controllers\API\APICategoryController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\City\CityController;
use App\Http\Controllers\Province\ProvinceController;


class ItemServiceProvider extends ServiceProvider
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
        
         $this->app->when(APIItemsController::class)
          ->needs(ItemInterface::class)
          ->give(ItemRepository::class);

        $this->app->when(APICategoryController::class)
          ->needs(ItemInterface::class)
          ->give(ItemRepository::class);

        $this->app->when(CityController::class)
          ->needs(ItemInterface::class)
          ->give(ItemRepository::class);

        $this->app->when(UserController::class)
          ->needs(ItemInterface::class)
          ->give(ItemRepository::class);

        $this->app->when(ProvinceController::class)
          ->needs(ItemInterface::class)
          ->give(ItemRepository::class);

    }
}

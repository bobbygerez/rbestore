<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Item\ItemInterface;
use App\Repo\Item\ItemRepository;

use App\Http\Controllers\API\APIItemsController;

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

    }
}

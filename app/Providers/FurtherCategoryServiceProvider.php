<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\FurtherCategory\FurtherCategoryInterface;
use App\Repo\FurtherCategory\FurtherCategoryRepository;

use App\Http\Controllers\API\APICategoryController;
use App\Http\Controllers\API\APIItemsController;

class FurtherCategoryServiceProvider extends ServiceProvider
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
        $this->app->when(APICategoryController::class)
          ->needs(FurtherCategoryInterface::class)
          ->give(FurtherCategoryRepository::class);

        $this->app->when(APIItemsController::class)
          ->needs(FurtherCategoryInterface::class)
          ->give(FurtherCategoryRepository::class);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Category\CategoryInterface;
use App\Repo\Category\CategoryRepository;
use App\Repo\Category\APICategoryRepository;

use App\Http\Controllers\Category\UserCategoryController;
use App\Http\Controllers\API\APICategoryController;
use App\Http\Controllers\API\APIItemsController;

class CategoryServiceProvider extends ServiceProvider
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
        $this->app->when(UserCategoryController::class)
          ->needs(CategoryInterface::class)
          ->give(CategoryRepository::class);

        $this->app->when(APICategoryController::class)
          ->needs(CategoryInterface::class)
          ->give(APICategoryRepository::class);

        $this->app->when(APIItemsController::class)
          ->needs(CategoryInterface::class)
          ->give(APICategoryRepository::class);
    }
}

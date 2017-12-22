<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\SubCategory\SubCategoryInterface;
use App\Repo\SubCategory\SubCategoryRepository;
use App\Repo\SubCategory\APISubCategoryRepository;

use App\Http\Controllers\API\UserSubCategoryController;
use App\Http\Controllers\API\APICategoryController;
class SubCategoryServiceProvider extends ServiceProvider
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

        $this->app->when(UserSubCategoryController::class)
          ->needs(SubCategoryInterface::class)
          ->give(SubCategoryRepository::class);

         $this->app->when(APICategoryController::class)
          ->needs(SubCategoryInterface::class)
          ->give(APISubCategoryRepository::class);
    }
}

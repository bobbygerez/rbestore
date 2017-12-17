<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Category\CategoryInterface;
use App\Repo\Category\CategoryRepository;

use App\Http\Controllers\Category\UserCategoryController;

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
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Branch\BranchInterface;
use App\Repo\Branch\APIBranchRepository;

use App\Http\Controllers\API\APIBranchController;

class BranchServiceProvider extends ServiceProvider
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
         $this->app->when(APIBranchController::class)
          ->needs(BranchInterface::class)
          ->give(APIBranchRepository::class);
    }
}

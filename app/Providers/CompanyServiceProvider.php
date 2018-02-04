<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Company\CompanyInterface;
use App\Repo\Company\CompanyRepository;



use App\Http\Controllers\API\APICompanyController;

class CompanyServiceProvider extends ServiceProvider
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
        $this->app->when(APICompanyController::class)
          ->needs(CompanyInterface::class)
          ->give(CompanyRepository::class);
    }
}

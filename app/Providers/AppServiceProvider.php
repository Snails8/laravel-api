<?php

namespace App\Providers;

use App\Services\CompanyService;
use App\Services\UtilityService;
use App\Services\Api\HrAdmin\UserService as HrAdminUserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('utility', UtilityService::class);
        $this->app->bind('company', CompanyService::class);
        // HrAdmin
        $this->app->bind('hrUser', HrAdminUserService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

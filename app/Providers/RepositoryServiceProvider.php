<?php

namespace App\Providers;

use App\Repositories\Admin\News\NewsRepository;
use App\Repositories\Admin\News\NewsRepositoryInterface;
use Illuminate\Support\ServiceProvider;


/**
 * リポジトリを登録する
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        // Admin
        $this->app->bind(NewsRepositoryInterface::class, NewsRepository::class);
        $this->app->bind();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}

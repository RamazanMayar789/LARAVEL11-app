<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Repositories\admin\ProductRepositories;

use App\Repositories\Admin\AdminProductRepositories;
use App\Repositories\admin\ProductRepositoriesInterface;
use app\Repositories\admin\AdminProductRepositoriesInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      $this->app->singleton(ProductRepositoriesInterface::class, ProductRepositories::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}

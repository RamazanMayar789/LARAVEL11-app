<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Repositories\admin\CityRepository;
use App\Repositories\admin\StateRepository;

use App\Repositories\admin\CountryRepository;
use App\Repositories\admin\CategoryRepository;
use App\Repositories\admin\ProductRepositories;
use App\Repositories\admin\CityRepositoryInterface;
use App\Repositories\Admin\AdminProductRepositories;
use App\Repositories\admin\StateRepositoryInterface;
use App\Repositories\admin\CountryRepositoryInterface;
use App\Repositories\admin\ProductRepositoriesInterface;
use App\Repositories\admin\CategoryRepositoriesInterface;
use app\Repositories\admin\AdminProductRepositoriesInterface;
use App\Repositories\admin\DeliveryRepository;
use App\Repositories\admin\DeliveryRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      $this->app->singleton(ProductRepositoriesInterface::class, ProductRepositories::class);
      $this->app->singleton(CategoryRepositoriesInterface::class, CategoryRepository::class);
      $this->app->singleton(CityRepositoryInterface::class, CityRepository::class);
      $this->app->singleton(CountryRepositoryInterface::class, CountryRepository::class);
      $this->app->singleton(StateRepositoryInterface::class, StateRepository::class);
      $this->app->singleton(DeliveryRepositoryInterface::class, DeliveryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}

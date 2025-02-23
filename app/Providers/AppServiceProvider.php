<?php

namespace App\Providers;

use App\Models\Admin;
use App\Repositories\admin\PaymentMethodeRepository;
use App\Repositories\admin\PaymentMethodeRepositoryInterface;
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
use App\Repositories\admin\storyRepositoryInterface;
use App\Repositories\admin\sliderRepositoryInterface;
use App\Repositories\admin\storyRepository;
use App\Repositories\admin\sliderRepository;
// use App\Repositories\client\first_page\firstpageRepositoryInterface;
use App\Repositories\client\first_page\firstpageRepository;
use App\Repositories\client\first_page\first_pageRepositoryInterface;


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
      $this->app->singleton(PaymentMethodeRepositoryInterface::class, PaymentMethodeRepository::class);
      $this->app->singleton(storyRepositoryInterface::class, storyRepository::class);
      $this->app->singleton(sliderRepositoryInterface::class, sliderRepository::class);
      $this->app->singleton(first_pageRepositoryInterface::class,firstpageRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}

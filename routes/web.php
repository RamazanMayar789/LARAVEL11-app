<?php

use App\Livewire\Admin\Country\Index as CountryIndex;

use App\Livewire\Admin\Product\Create as ProductCreate;
use App\Livewire\Admin\Category\Features as FeatureIndex;
use App\Livewire\Admin\Category\FeatureValue as FeatureValueIndex;
use App\Livewire\Admin\Dashboard\Index as DashboardIndex;
use App\Livewire\Admin\Category\Index as CategoryIndex;
use App\Livewire\Admin\State\Index as StateIndex;
use App\Livewire\Admin\City\Index as CityIndex;
use App\Livewire\Admin\Product\Index as ProductIndex;
use Illuminate\Support\Facades\Route;


Route::get('/admin', DashboardIndex::class)->name('admin.dashboard.index');
Route::get('/admin/countries',CountryIndex::class)->name('admin.country.index');
Route::get('/admin/category',CategoryIndex::class)->name('admin.category.index');
Route::get('/admin/state/',StateIndex::class)->name('admin.state.index');
Route::get('/admin/city',CityIndex::class)->name('admin.city.index');
Route::get('/admin/category/{category}/features',FeatureIndex::class)->name('admin.category.feature');
Route::get('/admin/category//features/{categoryFeature}/values',action: FeatureValueIndex::class)
->name('admin.category.feature.values');
Route::get('/admin/product/create',ProductCreate::class)->name('admin.product.create');
Route::get('/admin/product/index',ProductIndex::class)->name('admin.product.index');


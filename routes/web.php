<?php

use App\Livewire\Admin\Country\Index as CountryIndex;
use App\Livewire\Admin\Category\Features as FeatureIndex;
use App\Livewire\Admin\Dashboard\Index as DashboardIndex;
use App\Livewire\Admin\Category\Index as CategoryIndex;
use App\Livewire\Admin\State\Index as StateIndex;
use App\Livewire\Admin\City\Index as CityIndex;
use Illuminate\Support\Facades\Route;


Route::get('/admin', DashboardIndex::class)->name('admin.dashboard.index');
Route::get('/admin/countries',CountryIndex::class)->name('admin.country.index');
Route::get('/admin/category',CategoryIndex::class)->name('admin.category.index');
Route::get('/admin/state/',StateIndex::class)->name('admin.state.index');
Route::get('/admin/city',CityIndex::class)->name('admin.city.index');
Route::get('/admin/category/{category}/features',FeatureIndex::class)->name('admin.category.feature');



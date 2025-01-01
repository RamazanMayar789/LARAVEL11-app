<?php

use App\Livewire\Admin\Country\Index as CountryIndex;
use App\Livewire\Admin\Dashboard\Index as DashboardIndex;
use Illuminate\Support\Facades\Route;


Route::get('/admin', DashboardIndex::class)->name('admin.dashboard.index');
Route::get('/admin/countries',CountryIndex::class)->name('admin.country.index');



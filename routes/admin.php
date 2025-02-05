<?php

use App\Livewire\Admin\Country\Index as CountryIndex;

use App\Livewire\Admin\Delivery\Index as DeliveryIndex;
use App\Livewire\Admin\Payment\Index as PaymentIndex;
use App\Livewire\Admin\Product\Create as ProductCreate;
use App\Livewire\Admin\Category\Features as FeatureIndex;
use App\Livewire\Admin\Category\FeatureValue as FeatureValueIndex;
use App\Livewire\Admin\Dashboard\Index as DashboardIndex;
use App\Livewire\Admin\Category\Index as CategoryIndex;
use App\Livewire\Admin\Product\Features as ProductFeatures;
use App\Livewire\Admin\Product\Content as Productcontent;
use App\Livewire\Admin\State\Index as StateIndex;
use App\Livewire\Admin\City\Index as CityIndex;
use App\Livewire\Admin\Payment\Index;
use App\Livewire\Admin\Product\CKUplode;
use App\Livewire\Admin\Product\Index as ProductIndex;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function(){
    Route::get('/dashboard', DashboardIndex::class)->name('dashboard.index');
    Route::get('/countries', CountryIndex::class)->name('country.index');
    Route::get('/category', CategoryIndex::class)->name('category.index');
    Route::get('/state', StateIndex::class)->name('state.index');
    Route::get('/city', CityIndex::class)->name('city.index');
    Route::get('/category/{category}/features', FeatureIndex::class)->name('category.feature');
    Route::get('/category//features/{categoryFeature}/values', action: FeatureValueIndex::class)
        ->name('category.feature.values');
    Route::get('/product/create', ProductCreate::class)->name('product.create');
    Route::get('/product/index', ProductIndex::class)->name('product.index');
    Route::get('/product/features/{product}', ProductFeatures::class)->name('product.features');
    Route::get('/product/content/{product}', Productcontent::class)->name('product.content');
    Route::get('/delivery/methode', DeliveryIndex::class)->name('delivery.index');
    Route::get('/payment', PaymentIndex::class)->name('payment.index');

    Route::post('/ck-uplode/{product}', [CKUplode::class, 'uplode'])->name('ck-uplode');


});





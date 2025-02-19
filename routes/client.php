<?php

use App\Livewire\Client\Auth\Index as clientIndex;
use App\Livewire\Client\Home\Index as HomeIndex;
use Illuminate\Support\Facades\Route;

Route::name('client.')->group(function(){


Route::get('/', HomeIndex::class)->name('home');
Route::get('/auth', clientIndex::class)->name('auth.index');
    Route::get('/gmail', [clientIndex::class, 'redirectToProvider'])->name('gmail');
    Route::get('/Auth/gmail/callback', [clientIndex::class, 'handleProviderCallback'])
    ->name('gmail.callback');

});

?>

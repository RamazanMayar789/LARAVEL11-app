<?php

use App\Livewire\Client\Auth\Index as clientIndex;
use Illuminate\Support\Facades\Route;

Route::name('client')->group(function(){


Route::get('/auth', clientIndex::class)->name('auth.index');

});

?>

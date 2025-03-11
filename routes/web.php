<?php

use App\Http\Controllers\Dashboard\StoreController;
use Illuminate\Support\Facades\Route;


Route::resource('stores', StoreController::class);

Route::get('/', function ()  {
return view('dashboard.layout.app');
});

Route::get('admin', function () {
    return view('dashboard.layout.app');
})->name('admin');

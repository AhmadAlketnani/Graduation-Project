<?php

Route::get('/', function () {
    return redirect()->intended(route('admin.'));
})->name('home');

<?php

Route::get('/home', function () {
    return redirect()->intended(route('admin.'));
})->name('home');

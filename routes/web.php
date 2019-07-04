<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('auth.login');
});

Route::namespace('Admin')->group(function () {
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
});

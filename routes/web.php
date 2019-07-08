<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', function () {
    if (Auth::check()):
        return redirect()->route('dashboard');
    endif;
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    // Display view
    Route::get('/users', 'DataTableController@index')->name('users');
    // Get Data
    Route::get('/users/lists', 'DataTableController@lists')->name('users/lists');
});

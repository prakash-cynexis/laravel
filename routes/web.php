<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', function () {
    if (Auth::check()):
        return redirect()->route('dashboard');
    endif;
    return view('auth.login');
});

Route::get('test/request', [TestController::class, 'testRequest']);
Route::get('test/response', [TestController::class, 'testResponse']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    // Display view
    Route::get('/users', 'DataTableController@index')->name('users');
    // Get Data
    Route::get('/users/lists', 'DataTableController@lists')->name('users/lists');
});

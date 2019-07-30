<?php

use Illuminate\Support\Facades\Route;

Route::namespace('ApiV1')->group(function () {
    Route::get('user/hello', 'TestController@hello');
});

#after gating authentication code
Route::middleware('jwt-verify')->namespace('ApiV1')->group(function () {
    Route::get('user/hello', 'TestController@hello');
});

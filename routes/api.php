<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1/auth')->group(function () {

    Route::post('login', 'AuthController@login')->name('auth.login');
    Route::post('logout', 'AuthController@logout')->name('auth.logout');
    Route::post('refresh', 'AuthController@refresh')->name('auth.refresh');
    Route::post('show', 'AuthController@showMe')->name('auth.show');

});

Route::prefix('v1/admin')->group(function () {
    Route::apiResources([
        'users' => 'API\UsersController',
    ]);
});

Route::prefix('v1/peaje')->group(function () {
    Route::apiResources([
        'users' => 'API\UsersController',
    ]);
});

Route::prefix('v1/remisiones')->group(function () {
    Route::apiResources([
        'users' => 'API\UsersController',
    ]);
});

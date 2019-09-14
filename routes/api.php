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

    Route::post('login', 'API\AuthController@login')->name('api.auth.login');
    Route::post('logout', 'API\AuthController@logout')->name('api.auth.logout');
    Route::post('refresh', 'API\AuthController@refresh')->name('api.auth.refresh');
    Route::post('show', 'API\AuthController@showMe')->name('api.auth.show');

});

Route::prefix('v1/admin')->group(function () {
    Route::apiResources([
        'roles'     => 'API\RolesController',
        'users'     => 'API\UsersController',
        'states'    => 'API\StatesController',
        'cities'    => 'API\CitiesController',
    ]);
});

Route::prefix('v1/peaje')->group(function () {
    Route::apiResources([
        'tolls'                 => 'API\TollsController',
        'type-toll-vehicles'    => 'API\TypeTollVehiclesController',
    ]);
});

Route::prefix('v1/remisiones')->group(function () {
    Route::apiResources([
        'ballots'       => 'API\BallotsController',
        'marks'         => 'API\MarksController',
        'type-vehicles' => 'API\TypeVehiclesController',
    ]);
});

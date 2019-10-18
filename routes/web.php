<?php

use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Ruta para la Landing Page.
Route::get('/', 'PagesController@index')->name('welcome');
Route::get('/ver-multas', 'PagesController@multas')->name('ver.multas');

// Rutas para la autenticación en modo web.
Auth::routes();

// Ruta para obtener un hash de un valor para password.
Route::get('hash/{valor}', function($valor){
    return Hash::make($valor);
});

// Rutas para el inicio de la aplicación.
Route::get('/home', 'HomeController@index')->name('home');

// Rutas para area administrativa.
Route::resource('admin/perfiles', 'RolesController');
Route::resource('admin/usuarios', 'UsersController');
Route::resource('admin/departamentos', 'StatesController');
Route::resource('admin/municipios', 'CitiesController');
Route::post('admin/send/{title}/{to}/{content}', 'EmailController@send')->name('admin.mail.send');

// Rutas para el area de peaje.
Route::get('peaje/diario', 'PeajeController@diario')->name('peaje.diario');
Route::get('peaje/mensual', 'PeajeController@mensual')->name('peaje.mensual');
Route::get('peaje/reporte/diario', 'PeajeController@generate_diario')->name('peaje.generate.diario');
Route::get('peaje/reporte/mensual', 'PeajeController@generate_mensual')->name('peaje.generate.mensual');
//         ['peaje/municipios', 'CitiesController'],
//         ['peaje/municipios', 'CitiesController'],
//         ['peaje/municipios', 'CitiesController'],
//     ]);

Route::get('multas/listar', 'MultasController@index')->name('multas.index');
Route::get('multas/create', 'MultasController@create')->name('multas.create');
Route::post('multas/store', 'MultasController@store')->name('multas.store');
Route::get('multas/{id}', 'MultasController@show')->name('multas.show');
Route::get('multas/print', 'MultasController@print')->name('multas.print');

// Rutas para el area de remisiones.
// Route::resource('multas/municipios', 'CitiesController');

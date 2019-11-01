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
Route::get('hash/{valor}', function ($valor) {
    return Hash::make($valor);
});

// Rutas para el inicio de la aplicación.
Route::get('/home', 'HomeController@index')->name('home');

// Rutas para area administrativa.
Route::resource('admin/perfiles', 'RolesController');
Route::resource('admin/usuarios', 'UsersController');
Route::resource('admin/departamentos', 'StatesController');
Route::resource('admin/municipios', 'CitiesController');
Route::resource('admin/multas-cobradas', 'PaymentBallotController');
// Route::resource('admin/costos-peajes', 'CitiesController');
Route::resource('admin/costos-peajes', 'CostosPeajeController');
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
Route::get('multas/anuladas', 'MultasController@anuladas')->name('multas.anuladas');
Route::get('multas/decomisos', 'MultasController@seizures')->name('multas.decomisos');
Route::get('multas/create', 'MultasController@create')->name('multas.create');
Route::get('multas/cobros', 'PaymentBallotController@index')->name('multas-cobradas.index');
Route::get('multas/cobros/create/{ballot}', 'PaymentBallotController@create')->name('multas-cobradas.create');
Route::post('multas/cobros/store', 'PaymentBallotController@store')->name('multas-cobradas.store');
Route::get('multas/cobros/listar', 'PaymentBallotController@listar')->name('multas-cobradas.listar');
Route::get('multas/seizures/show/{ballot}', 'MultasController@seizureshow')->name('multas.seizureshow');
Route::get('multas/show/{ballot}', 'PaymentBallotController@show')->name('multas-cobradas.show');
Route::post('multas/store', 'MultasController@store')->name('multas.store');
Route::get('multas/{ballot}', 'MultasController@show')->name('multas.show');
Route::get('multas/{ballot}/print', 'MultasController@print')->name('multas.print');
Route::get('multas/{ballot}/voided', 'MultasController@voided')->name('multas.voided');
Route::put('multas/{ballot}', 'MultasController@anular')->name('multas.anular');

// Rutas para el area de remisiones.
// Route::resource('multas/municipios', 'CitiesController');

Route::get('costos-peajes/create', 'CostosPeajeController@create')->name('costos-peajes.create');
Route::get('costos-peajes/listar', 'CostosPeajeController@index')->name('costos-peajes.index');
Route::post('costos-peajes/store', 'CostosPeajeController@store')->name('costos-peajes.store');
Route::get('costos-peajes/show/{costos}', 'CostosPeajeController@show')->name('costos-peajes.show');
Route::get('costos-peajes/{costos}/edit', 'CostosPeajeController@edit')->name('costos-peajes.edit');
Route::put('costos-peajes/update/{costos}', 'CostosPeajeController@update')->name('costos-peajes.update');
// Route::get('costos-peajes/delete/{costos}', 'CostosPeajeController@delete')->name('costos-peajes.delete');
// Route::delete('costos-peajes/destroy/{costos}', 'CostosPeajeController@destroy')->name('costos-peajes.destroy');


//Rutas para el de costos de peaje.
//Rutas para multas pagadas

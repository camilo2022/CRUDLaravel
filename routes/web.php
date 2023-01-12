<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});
/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    })->name('dash');
});*/

Route::resource('/clientes', App\Http\Controllers\ClienteController::class)->middleware('auth');
// PERFIL
// *************************************
Route::get('/dash','App\Http\Controllers\DashboardController@index')->name('dashboard');

Route::get('/user/profile','App\Http\Controllers\DashboardController@setting')->name('profile.show');
// CRUD PARA LA GESTION DE CLIENTES
// *************************************
Route::get('/clientes','App\Http\Controllers\ClienteController@index')->name('vistaC');

Route::get('/clientes/create','App\Http\Controllers\ClienteController@create')->name('createC');

Route::post('/clientes/store','App\Http\Controllers\ClienteController@store')->name('storeC');

Route::get('/clientes/edit/{id}','App\Http\Controllers\ClienteController@edit')->name('editC');

Route::post('/clientes/update/{id}','App\Http\Controllers\ClienteController@update')->name('updateC');

Route::delete('/clientes/{id}','App\Http\Controllers\ClienteController@destroy')->name('deleteC');


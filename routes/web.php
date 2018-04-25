<?php

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
    return view('welcome');
});

Route::resource('persona/persona', 'Persona\\PersonaController');
Route::resource('direccion/direccion', 'Direccion\\DireccionController');
Route::resource('telefono/telefono', 'Telefono\\TelefonoController');



Route::get('direccion/direccion/{idpersona}/verDireccion', 'Direccion\\DireccionController@verDireccion');
Route::get('telefono/telefono/{idpersona}/verTelefono', 'Telefono\\TelefonoController@verTelefono');


Route::resource('tipoDireccion/tipoDireccion', 'TipoDireccion\\TipoDireccionController');
Route::resource('tipoTelefono/tipoTelefono', 'TipoTelefono\\TipoTelefonoController');


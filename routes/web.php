<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/',"HomeController@index");
Route::resource("personal", "PersonalController");
Route::resource("proyectos", "ProyectoController");
Auth::routes();
Route::resource("contratos", "ContratosController");
Route::resource('logs', 'LogController', ['only' => [
    'index', 'show'
]]);
Route::resource("users", "UserController");
Route::post("sync/add/personal", "SyncController@addPersonal");
Route::post("sync/delete/personal", "SyncController@deletePersonal");
Route::post("sync/inout/personal", "SyncController@inoutPersonal");
Route::get("json/cargos", "PersonalController@getCargos");
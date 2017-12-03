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
    return view('home');
});

Auth::routes();

Route::get('/usuarios', 'Admin\UserController@index');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin'], function (){

    Route::get('/usuarios', 'UserController@index');
    Route::get('/usuarios/crear', 'UserController@create');
    Route::post('/usuarios/crear', 'UserController@store');
    Route::get('/usuarios/{id}/editar', 'UserController@edit');
    Route::post('/usuarios/{id}/editar', 'UserController@update');
    Route::get('/usuarios/{id}/eliminar', 'UserController@delete');

    Route::get('/usuarios/reportes', 'UserController@report');
    Route::get('/usuarios/excel', 'UserController@excel');

});
<?php

Route::get('/', function () {
    return redirect('/login'); // view('home');
});

Auth::routes();

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

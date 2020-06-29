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
//****************** PAGINA DE INICIO
Route::get('/', function () {return view('welcome');});

//****************** PAGINAS CON AUTENTIFICACION
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/miembros/listado',function (){return view('crud_tablas.miembros.index');});
    Route::resource('miembros','MiembrosController',['except' => ['create', 'show']]);

    Route::get('/organizacion/listado',function (){return view('crud_tablas.organizacion.index');});
    Route::resource('organizacion','OrganizacionController',['except' => ['create', 'show']]);

    Route::get('/organizacion/miembros/{id}','MiembrOrganizacionController@inicio')->name('MOrg_inicio');
    Route::get('/organizacion/miembros/lista/{id}','MiembrOrganizacionController@listar');
    Route::get('/organizacion/miembros-modal','MiembrOrganizacionController@listamodal')->name('miembrosModal');
    Route::resource('/organizacion/miembros','MiembrOrganizacionController',['except' => ['index','create','show','edit','update']]);

    Route::get('/llamamiento/listado',function (){return view('crud_tablas.llamamiento.index');});
    Route::resource('llamamiento','LlamamientoController',['except' => ['create', 'show']]);

});
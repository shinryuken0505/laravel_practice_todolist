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


Route::get('todolist/index','TodolistsController@index');
Route::get('todolist/add', function ($id = null) {
     return view('todolist');
});
Route::get('todolist/edit/{id?}','TodolistsController@edit');
Route::get('todolist/complete/{id?}','TodolistsController@complete');
Route::post('todolist/store','TodolistsController@store');
Route::post('todolist/store/{id?}','TodolistsController@store');
Route::get('todolist/delete/{id?}','TodolistsController@delete');


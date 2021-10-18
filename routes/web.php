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
    return view('welcome');
});



//crud show page route
Route::get('crud-app', 'CrudController@showFrom');
//crud add data rote

Route::POST('crud-add', 'CrudController@createCrudData');

//show all data route
Route::get('crud-all', 'CrudController@showAllData');

//crud single data route
Route::get('crud-show/{id}', 'CrudController@singleShow');

//crud delete data 
Route::get('crud-delete/{id}', 'CrudController@deleteData');

//crud edit data 
Route::get('crud-edit/{id}', 'CrudController@editData');

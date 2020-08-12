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

Route::get('/companies', function () {
    return view('companies');
});

Route::get('/people', function () {
    return view('people');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('companies', 'companyController');


Route::get('companies', 'companyController@index');


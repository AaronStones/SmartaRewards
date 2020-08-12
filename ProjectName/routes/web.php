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

Route::get('/company', function () {
    return view('company');
});

Route::get('/person', function () {
    return view('person');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('companies', 'companyController');
Route::resource('company', 'companyController');
Route::resource('people', 'peopleController');


Route::get('companies', 'companyController@index');
Route::get('people', 'peopleController@index');


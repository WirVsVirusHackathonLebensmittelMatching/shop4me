<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::post('/cities/find', function (Request $request) {
    $controller = new \App\Http\Controllers\RegisterCityOwnerController();

    return $controller->findZipCode($request);
})->name('cities.find');

Route::post('/cities/register', function (Request $request) {
    $controller = new \App\Http\Controllers\RegisterCityOwnerController();

    return $controller->registerCity($request);
})->name('cities.register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

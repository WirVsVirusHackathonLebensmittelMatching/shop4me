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
    $controller = new \App\Http\Controllers\RegisterCityOwnerController();

    return $controller->index();
})->name('home');

Route::post('/cities/find', function (Request $request) {
    $controller = new \App\Http\Controllers\RegisterCityOwnerController();

    return $controller->findZipCode($request);
})->name('cities.find');

Route::post('/cities/register', function (Request $request) {
    $controller = new \App\Http\Controllers\RegisterCityOwnerController();

    return $controller->registerCity($request);
})->name('cities.register');


Route::get('/cities/edit/{id}', function ($id) {
    $controller = new \App\Http\Controllers\RegisterCityOwnerController();

    return $controller->edit($id);
})->name('cities.edit');

Route::post('/cities/update/{id}', function (Request $request, $id) {
    $controller = new \App\Http\Controllers\RegisterCityOwnerController();

    return $controller->update($request, $id);
})->name('cities.update');

Route::post('/city-teams/update/{id}', function (Request $request, $id) {
    $controller = new \App\Http\Controllers\CityTeamController();

    return $controller->update($request, $id);
})->name('city-teams.update');

Route::get('/city-teams/view/{id}', function ($id) {
    $controller = new \App\Http\Controllers\CityTeamController();

    return $controller->view($id);
})->name('city-teams.view');

Route::get('/city-teams/', function () {
    $controller = new \App\Http\Controllers\CityTeamController();

    return $controller->index();
})->name('city-teams.index');

Route::get('/admin/home', function () {
    $controller = new \App\Http\Controllers\CityTeamController();

    return $controller->admin();
})->name('admin.home');

Route::get('/pages/imprint', function () {
    $controller = new \App\Http\Controllers\PagesController();

    return $controller->page('pages.imprint');
})->name('page.imprint');

Route::get('/tools', function () {
    $controller = new \App\Http\Controllers\PagesController();

    return $controller->tools();
})->name('tools');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

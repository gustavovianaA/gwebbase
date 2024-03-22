<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'App\Http\Controllers\SiteHomeController@index')->name('site.home');
Route::get('/contato', 'App\Http\Controllers\SiteContactController@index')->name('site.contact');
Route::post('/enviar-mensagem', 'App\Http\Controllers\SiteContactController@store')->name('site.message');

Auth::routes();

Route::prefix('/app')->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('app.home');

    //gexample
    Route::resource('gexample', 'App\Http\Controllers\GexampleController');

    //Messages
    Route::resource('message', 'App\Http\Controllers\MessageController');

});


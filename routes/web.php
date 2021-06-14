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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/preview/{movie}', [\App\Http\Controllers\HomeController::class, 'preview'])->name('preview');
Route::get('/test', function ()
{
   return view('auth.registertest');
});
Route::resource('theater',\App\Http\Controllers\TheaterController::class);
Route::resource('movie', \App\Http\Controllers\MovieController::class);
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index']);
Route::get('/getTime/{name}', [\App\Http\Controllers\TheaterController::class, 'getTime']);

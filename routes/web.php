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
    $movies = \App\Models\Movie::all();
    return view('welcome', compact('movies'));
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
Route::get('/getTime/{id}', [\App\Http\Controllers\TheaterController::class, 'getTime']);
Route::get('/ticket/{movie}', [\App\Http\Controllers\TicketController::class, 'index']);
Route::post('/ticket/save', [\App\Http\Controllers\TicketController::class, 'store']);
Route::get('/getTicket/{id}/{time}', [\App\Http\Controllers\TicketController::class, 'getTicket']);
Route::get('/myTicket', [\App\Http\Controllers\TicketController::class, 'myTicket']);
Route::get('/allTicket', [\App\Http\Controllers\TicketController::class, 'allTicket']);

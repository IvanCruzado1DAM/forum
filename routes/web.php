<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\PostController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

/*Route::controller(PruebaController::class)->group(function(){
    Route::get('/prueba2/{name}', 'index');
});*/

Route::resource('/prueba2', Prueba2Controller::class);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/forums', [App\Http\Controllers\ForumController::class, 'index'])->name('index');

Route::resource('/forums',ForumController::class);

Route::resource('/forums/forums',ForumController::class);

Route::resource('/forums/posts',PostController::class);

Route::resource('/posts',PostController::class);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/', function() {
    return view('welcome');
});

Auth::routes();

Route::get('/publicacoes', [PostController::class, 'index']);

Route::get('/criar_publicacao', [PostController::class, 'criar']);
Route::post('/inserir_publicacao', [PostController::class, 'inserir']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

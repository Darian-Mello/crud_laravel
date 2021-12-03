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

Route::get('/home', [PostController::class, 'index']);

Route::get('/publicacao/criar', [PostController::class, 'criar']);
Route::get('/publicacao/editar/{id}', [PostController::class, 'editar']);
Route::get('/publicacao/minhas_publicacoes', [PostController::class, 'minhasPublicacoes']);
Route::post('/publicacao/inserir', [PostController::class, 'inserir']);
Route::put('/publicacao/atualizar/{id}', [PostController::class, 'atualizar']);
Route::delete('/publicacao/deletar/{id}', [PostController::class, 'deletar']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

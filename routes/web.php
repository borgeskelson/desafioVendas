<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutoController;

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
    return redirect('/home');
});
Route::get('/home', [HomeController::class, 'index']);
Route::post('/pedidos/store', [PedidoController::class, 'store'])->name('pedidos.store');

Route::get('/usuarios/novo', [UsuarioController::class, 'create']);
Route::post('/usuarios/novo', [UsuarioController::class, 'store'])->name('incluir_usuario');
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
Route::get('/usuarios/editar/{id}', [UsuarioController::class, 'edit']);
Route::post('/usuarios/editar/{id}', [UsuarioController::class, 'update'])->name('atualizar_usuario');
Route::get('/usuarios/excluir/{id}', [UsuarioController::class, 'delete']);
Route::post('/usuarios/excluir/{id}', [UsuarioController::class, 'destroy'])->name('remover_usuario');

Route::get('/produtos/novo', [ProdutoController::class, 'create']);
Route::post('/produtos/novo', [ProdutoController::class, 'store'])->name('incluir_produto');
Route::get('/produtos/{id}', [ProdutoController::class, 'show']);
Route::get('/produtos/editar/{id}', [ProdutoController::class, 'edit']);
Route::post('/produtos/editar/{id}', [ProdutoController::class, 'update'])->name('atualizar_produto');
Route::get('/produtos/excluir/{id}', [ProdutoController::class, 'delete']);
Route::post('/produtos/excluir/{id}', [ProdutoController::class, 'destroy'])->name('remover_produto');

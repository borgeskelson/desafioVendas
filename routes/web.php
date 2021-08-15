<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PedidoController;

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
Route::get('/home', [ProdutoController::class, 'index']);
Route::get('/usuarios/{id}/pedidos', [UsuarioController::class, 'indexPedidos']);
Route::post('/pedidos/store', [PedidoController::class, 'store'])->name('pedidos.store');
Route::get('/pedidos/{id}/show', [PedidoController::class, 'show']);
Route::get('/pedidos/{id}/checkout', [PedidoController::class, 'edit']);
Route::post('/pedidos/{id}/checkout', [PedidoController::class, 'update'])->name('pedidos.checkout');
Route::get('/pedidos/{id}/finish', [PedidoController::class, 'update']);

Route::resources([
    'usuarios' => UsuarioController::class,
    'produtos' => ProdutoController::class
]);

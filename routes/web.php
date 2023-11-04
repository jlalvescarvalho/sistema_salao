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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Produto
Route::get('/produtos', [App\Http\Controllers\ProdutoController::class, 'index'])->name('produtos');
Route::get('/produtos/novo', [App\Http\Controllers\ProdutoController::class, 'create'])->name('novo-produto');
Route::post('/produtos', [App\Http\Controllers\ProdutoController::class, 'store'])->name('salvar-produto');
Route::get('/produtos/show/{id},{empresa}', [App\Http\Controllers\ProdutoController::class, 'show'])->name('produto-vizualizar');
Route::get('/produtos/edit/{id},{empresa}', [App\Http\Controllers\ProdutoController::class, 'edit'])->name('produto-editar');
Route::put('/produtos/update', [App\Http\Controllers\ProdutoController::class, 'update'])->name('produto-update');
Route::delete('/produtos/delete/{id},{empresa}', [App\Http\Controllers\ProdutoController::class, 'destroy'])->name('produto-apagar');

//Cliente
Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('clientes');
Route::get('/clientes/novo', [App\Http\Controllers\ClienteController::class, 'create'])->name('novo-cliente');
Route::post('/clientes', [App\Http\Controllers\ClienteController::class, 'store'])->name('salvar-cliente');
Route::get('/clientes/show/{id},{empresa}', [App\Http\Controllers\ClienteController::class, 'show'])->name('cliente-vizualizar');
Route::get('/clientes/edit/{id},{empresa}', [App\Http\Controllers\ClienteController::class, 'edit'])->name('cliente-editar');
Route::put('/clientes/update', [App\Http\Controllers\ClienteController::class, 'update'])->name('cliente-update');
Route::delete('/clientes/delete/{id},{empresa}', [App\Http\Controllers\ClienteController::class, 'destroy'])->name('cliente-apagar');

Route::resource('servicos', App\Http\Controllers\ServicoController::class);

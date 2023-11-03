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

//Servicos
Route::get('/servicos', [App\Http\Controllers\ServicoController::class, 'index'])->name('servicos');
Route::get('/servicos/novo', [App\Http\Controllers\ServicoController::class, 'create'])->name('novo-servico');
Route::post('/servicos', [App\Http\Controllers\ServicoController::class, 'store'])->name('salvar-servico');
Route::get('/servicos/show/{id},{empresa}', [App\Http\Controllers\ServicoController::class, 'show'])->name('servico-vizualizar');
Route::get('/servicos/edit/{id},{empresa}', [App\Http\Controllers\ServicoController::class, 'edit'])->name('servico-editar');
Route::put('/servicos/update', [App\Http\Controllers\ServicoController::class, 'update'])->name('servico-update');
Route::delete('/servicos/delete/{id},{empresa}', [App\Http\Controllers\ServicoController::class, 'destroy'])->name('servico-apagar');

//Empresa
Route::get('/empresa/novo', [App\Http\Controllers\EmpresaController::class, 'create'])->name('novo-empresa');
Route::post('/empresa', [App\Http\Controllers\EmpresaController::class, 'store'])->name('salvar-empresa');
Route::get('/empresa/show', [App\Http\Controllers\EmpresaController::class, 'show'])->name('empresa-vizualizar');
Route::get('/empresa/edit/{id}', [App\Http\Controllers\EmpresaController::class, 'edit'])->name('empresa-editar');
Route::put('/empresa/update', [App\Http\Controllers\EmpresaController::class, 'update'])->name('empresa-update');

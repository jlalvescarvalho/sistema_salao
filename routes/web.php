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
Route::resource('produtos', App\Http\Controllers\ProdutoController::class);
Route::resource('clientes', App\Http\Controllers\ClienteController::class);
Route::resource('servicos', App\Http\Controllers\ServicoController::class);
Route::resource('pacotes', App\Http\Controllers\PacoteController::class);
Route::resource('contratos', App\Http\Controllers\ContratoPacoteController::class);


Route::resource('contratos', App\Http\Controllers\PacoteController::class)->only([
    'index', 'store'
]);
Route::post('contratos/{id}/cancelar', [App\Http\Controllers\PacoteController::class, 'cancelar'])->name('contratos.cancelar');

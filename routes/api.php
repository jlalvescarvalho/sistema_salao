<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/agendamentos/buscar', [App\Http\Controllers\AgendamentoController::class, 'buscar'])->name('agendamentos.buscar');
Route::post('/agendamentos', [App\Http\Controllers\AgendamentoController::class, 'store'])->name('agendamentos.store');
Route::put('/agendamentos/{id}', [App\Http\Controllers\AgendamentoController::class, 'update'])->name('agendamentos.update');
Route::post('/agendamentos/{id}/concluir', [App\Http\Controllers\AgendamentoController::class, 'concluir'])->name('agendamentos.concluir');

Route::get('/pacotes/agendamentos/buscar', [App\Http\Controllers\AgendamentoPacoteController::class, 'buscar'])->name('pacotes.agendamentos.buscar');
Route::post('/pacotes/agendamentos', [App\Http\Controllers\AgendamentoController::class, 'store'])->name('pacotes.agendamentos.store');
Route::put('/pacotes/agendamentos/{id}', [App\Http\Controllers\AgendamentoController::class, 'update'])->name('pacotes.agendamentos.update');
Route::post('/pacotes/agendamentos/{id}/concluir', [App\Http\Controllers\AgendamentoController::class, 'concluir'])->name('pacotes.agendamentos.concluir');

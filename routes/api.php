<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Api\CadastroUserController;
use App\Http\Controllers\api\VagasController;

 Route::post('/Cadastro', [CadastroUserController::class, 'processCad'])->name('CadProcess');
 Route::post('/CadastroRecrutador', [CadastroUserController::class, 'recruiterCadRecutrador'])->name('recruiterProcess');

  Route::post('/Tokens', [CadastroUserController::class, 'allToken'])->name('all');

 Route::middleware(['auth:sanctum'])->group(function () {
   
 Route::post('/Cadvagas', [VagasController::class, 'StoreVagas'])->name('vagas');
});
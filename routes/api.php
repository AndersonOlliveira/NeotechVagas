<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\CadastroUserController;
use App\Http\Controllers\api\VagasController;

Route::post('/Cadastro', [CadastroUserController::class, 'processCad'])->name('CadProcess');
Route::post('/CadastroRecrutador', [CadastroUserController::class, 'recruiterCadRecutrador'])->name('recruiterProcess');



Route::post('/Tokens', [CadastroUserController::class, 'allToken'])->name('all');


Route::post('/LoginsControl', [LoginController::class, 'index'])->name('index');


Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::post('/Vacancies', [VagasController::class, 'StoreVagas'])->name('vagas');
    
    Route::post('/Allvagasid', [VagasController::class, 'ListVagasid'])->name('listvagas');

});

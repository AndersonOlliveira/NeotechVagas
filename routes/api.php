<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\CadastroUserController;
use App\Http\Controllers\api\ListUsersController;
use App\Http\Controllers\api\VagasController;

Route::post('/Cadastro', [CadastroUserController::class, 'processCad'])->name('CadProcess');
Route::post('/CadastroRecrutador', [CadastroUserController::class, 'recruiterCadRecutrador'])->name('recruiterProcess');



Route::post('/Tokens', [CadastroUserController::class, 'allToken'])->name('all');


Route::post('/LoginsControl', [LoginController::class, 'index'])->name('index');

Route::post('/listUsers',[ListUsersController::class, 'storeUsers'])->name('listar');



Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::post('/Vacancies', [VagasController::class, 'StoreVagas'])->name('vagas');
    
    Route::post('/Allvagasid', [VagasController::class, 'ListVagasid'])->name('listvagas');

     Route::post('/Deletar', [ListUsersController::class, 'dell'])->name('DeletarUser');

     Route::post('/AtivarUser', [ListUsersController::class, 'ative'])->name('AtivarUser');

});

<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\routesControllers;
use Illuminate\Support\Facades\Route;


Route::middleware(['web'])->group(function () {

    Route::get('/', [routesControllers::class, 'index'])->name('page-inicial');
    Route::get('/Login', [routesControllers::class, 'login'])->name('login');
    Route::get('/Cadastrar', [routesControllers::class, 'Cad'])->name('cadastrase');
    Route::post('/Home', [LoginController::class, 'processLogin'])->name('LoginProcess');
    // Route::post('/Cadastro', [LoginController::class, 'processCad'])->name('CadProcess');
    Route::get('/Destroy', [LoginController::class, 'processDestroy'])->name('Destroy');
});

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/Home', [routesControllers::class, 'Homes'])->name('home');
});

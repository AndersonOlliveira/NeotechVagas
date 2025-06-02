<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\routesControllers;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [routesControllers::class ,'index'])->name('listar');

Route::post('/Login', [LoginController::class ,'index'])->name('login');
Route::middleware(['web', 'auth'])->group(function () {
Route::get('/Home', [routesControllers::class ,'Homes'])->name('home');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Middleware\AuthAdmin;
use App\Http\Controllers\RegisterController;
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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    
    
    Route::get('/dashboard', [LivreController::class, 'index'])->name('dashboard');
    Route::get('/', [LivreController::class, 'index'])->name('dashboard');
    Route::get('/livre/create', [LivreController::class, 'create'])->name('livres.create');
    Route::post('/livre', [LivreController::class, 'store'])->name('livres.store');
    
});


Route::middleware(['auth', 'auth.admin'])->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
});

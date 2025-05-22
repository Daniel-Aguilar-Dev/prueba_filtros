<?php

use App\Http\Controllers\sistema\general\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::resource('user', UserController::class)->names('user');
Route::get('user/data', [UserController::class, 'data'])->name('user.data');

Route::get('/asignar-rol', [UserController::class, 'formAsignarRol'])->name('usuarios.form-asignar-rol');
Route::post('/asignar-rol', [UserController::class, 'asignarRol'])->name('usuarios.asignar-rol');


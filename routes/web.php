<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('student.index');
    Route::get('/students/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::get('/search-student', [StudentController::class, 'search'])->name('student.search');
    Route::post('/add-student', [StudentController::class, 'store'])->name('student.store');
    Route::delete('/students/delete/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::post("/logout", [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get("/login", [AuthController::class, 'loginIndex'])->name('login');
    Route::post("/login", [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'registerIndex'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

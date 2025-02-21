<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [StudentController::class, 'index'])->name('student.index');
Route::get('/search-student', [StudentController::class, 'search'])->name('student.search');
Route::post('/add-student', [StudentController::class, 'store'])->name('student.store');

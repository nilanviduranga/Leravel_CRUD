<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, "index"])->name('home');

Route::get('/add-new-student', [StudentController::class, "create"])->name('add_new_student');
Route::post('/store-student', [StudentController::class, "store"])->name('store_student');

Route::post('/edit-student', [StudentController::class, "edit"])->name('edit_student');
Route::post('/update-student', [StudentController::class, "update"])->name('update_student');

Route::post('/delete-student', [StudentController::class, "delete"])->name('delete_student');

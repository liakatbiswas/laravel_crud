<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
 return view('welcome');
});

Route::get('/dashboard', function () {
 return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
 Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
 Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
 Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//   Student

 Route::get('/student', [StudentController::class, 'studentPage'])->name('student');
 Route::post('/student-regi', [StudentController::class, 'create'])->name('student-regi');
 Route::get('/student-list', [StudentController::class, 'read'])->name('student-list');
 Route::get('/student-edit/{id}', [StudentController::class, 'edit'])->name('student-edit');
 Route::post('/student-update/{id}', [StudentController::class, 'update'])->name('student-update');
 Route::post('/student-delete/{id}', [StudentController::class, 'delete'])->name('student-delete');

});

require __DIR__ . '/auth.php';

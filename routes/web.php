<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'index'])->name('users.list');

Route::get('/users', [UserController::class, 'index'])->name('users.list');

Route::get('/new', [UserController::class, 'create'])->name('new.user');

Route::post('/new/create', [UserController::class, 'store'])->name('new-create');

Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');

Route::post('/update/{id}', [UserController::class, 'update'])->name('update');

Route::post('/delete/{id}', [UserController::class, 'delete'])->name('delete');


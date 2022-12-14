<?php

use App\Http\Controllers;
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

Route::get('/', [Controllers\AdminController::class, 'index'])->name('home');

Route::prefix('admin')->group(function() {
    Route::get('/', [Controllers\AdminController::class, 'create'])->name('admin');
    Route::post('/store', [Controllers\AdminController::class, 'store'])->name('admin.store');
    Route::get('/{id}', [Controllers\AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/update/{id}', [Controllers\AdminController::class, 'update'])->name('admin.update');
    Route::post('/delete/{id}', [Controllers\AdminController::class, 'destroy'])->name('admin.delete');
});

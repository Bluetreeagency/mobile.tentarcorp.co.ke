<?php

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

Route::get('/', [App\Http\Controllers\pagesController::class, 'home'])->name('home.page');
Auth::routes();
Route::get('blank', [App\Http\Controllers\account\accountController::class, 'blank']);
Route::get('dashboard', [App\Http\Controllers\account\accountController::class, 'dashboard'])->name('dashboard.page');

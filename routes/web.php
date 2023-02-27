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
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::post('signup/account', [App\Http\Controllers\Auth\RegisterController::class, 'signup'])->name('save.signup');

Route::get('dashboard', [App\Http\Controllers\account\accountController::class, 'dashboard'])->name('dashboard.page');

Route::post('otp/verification', [App\Http\Controllers\account\accountController::class, 'otp_verification'])->name('otp.verification');
Route::get('otp/resend', [App\Http\Controllers\account\accountController::class, 'resend_otp'])->name('otp.resend');

Route::get('my-loans', [App\Http\Controllers\account\loansController::class, 'index'])->name('loan.index');
Route::get('loan-request', [App\Http\Controllers\account\loansController::class, 'create'])->name('loan.request');
Route::post('loan/repayment', [App\Http\Controllers\account\loansController::class, 'loan_repayment'])->name('loan.repayment');

Route::get('profile', [App\Http\Controllers\account\accountController::class, 'profile'])->name('profile.page');
Route::post('profile/update', [App\Http\Controllers\account\accountController::class, 'update_profile'])->name('profile.update');
Route::post('profile/update/documents', [App\Http\Controllers\account\accountController::class, 'update_documents'])->name('profile.update.documents');
Route::get('documents', [App\Http\Controllers\account\accountController::class, 'documents'])->name('documents.page');


Route::get('support', [App\Http\Controllers\pagesController::class, 'support'])->name('support.page');


Route::get('blank', [App\Http\Controllers\account\accountController::class, 'blank']);
Route::get('test', [App\Http\Controllers\pagesController::class, 'test']);


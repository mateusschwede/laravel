<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Feito Manual
Route::get('/admin', [App\Http\Controllers\AuthController::class, 'dashboard'])->name('admin');
Route::get('/admin/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('admin.login');
Route::get('/admin/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('admin.logout');
Route::post('/admin/login/do', [App\Http\Controllers\AuthController::class, 'login'])->name('admin.login.do');
<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/',[PostController::class,'showForm']);
Route::post('/debug',[PostController::class,'debug'])->name('debug');
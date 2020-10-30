<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuario/{id}',[UserController::class,'show']);
Route::get('/endereco/{address}',[AddressController::class,'show']);
Route::get('/artigo/{post}',[PostController::class,'show']);
Route::get('/categoria/{category}',[CategoryController::class,'show']); //category é o parâmetro do método 'show' em CategoryController
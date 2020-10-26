<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; //import Controller UserController

//Rota da página public '/' que retorna view welcome.blade.php
Route::get('/', function () {
    return view('welcome');
});

//User informa url no public 'listagem_usuario', levará ao Controller UserController e retornará function listUser
Route::get('listagem_usuario',[UserController::class,'listUser']);
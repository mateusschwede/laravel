<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtigoController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('artigos',[ArtigoController::class,'index']); //Listar artigos
Route::get('artigo/{id}',[ArtigoController::class,'show']); //Ver artigo
Route::post('artigo',[ArtigoController::class,'store']); //Criar artigo
Route::put('artigo/{id}',[ArtigoController::class,'update']); //Editar artigo
Route::delete('artigo/{id}',[ArtigoController::class,'destroy']); //Excluir artigo
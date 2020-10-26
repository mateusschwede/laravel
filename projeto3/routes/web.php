<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Form\TestController;

Route::get('/', function () {
    return view('welcome');
});

//Criador universal de rotas padrões para o controller TestController(get,post,put/patch,delete), altera o nome da route de 'usuario' para 'user', e altera os parâmetros de uri 'usuarios' para 'user'
Route::resource('usuarios',TestController::class)->names('user')->parameters(['usuarios'=>'user']);

//Route::delete('usuarios/destroy/{user}',[TestController::class,'destroy'])->name('user.destroy');
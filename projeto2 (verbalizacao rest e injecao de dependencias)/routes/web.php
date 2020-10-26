<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Form\TestController;

Route::get('/', function () {
    return view('welcome');
});

//Verbo GET: Obter informações do BD
Route::get('usuarios',[TestController::class,'listAllUsers'])->name('users.listAll');
Route::get('usuarios/{user}',[TestController::class,'listUser'])->name('users.list'); //Chave entra como var/parâmetro dentro do método desenvolvido, sendo informado via url

//Verbo POST: Enviar informações

//Verbo PUT/PATCH: Atualizar informações

//Verbo DELETE: Deletar informações
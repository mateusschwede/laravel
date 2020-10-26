<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Form\TestController;

Route::get('/', function () {
    return view('welcome');
});

//Verbo GET: Obter informações do BD
Route::get('usuarios',[TestController::class,'listAllUsers'])->name('users.listAll');
Route::get('usuarios/novo',[TestController::class,'formAddUser'])->name('users.formAddUser');
Route::get('usuarios/editar/{user}',[TestController::class,'formEditUser'])->name('users.formAddUser');
Route::get('usuarios/{user}',[TestController::class,'listUser'])->name('users.list'); //Chave entra como var/parâmetro dentro do método desenvolvido, sendo informado via url. Rotas dinâmicas SEMPRE abaixo das fixas

//Verbo POST: Enviar informações
Route::post('usuarios/store',[TestController::class,'storeUser'])->name('users.store');

//Verbo PUT/PATCH: Atualizar informações
Route::put('usuarios/edit/{user}',[TestController::class,'edit'])->name('users.edit');

//Verbo DELETE: Deletar informações
Route::delete('usuarios/destroy/{user}',[TestController::class,'destroy'])->name('user.destroy');
<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/home', function(){
    return view('home');
});

Route::post('auth/login',[AuthController::class,'login'])->name('login');
Route::group(['middleware'=>['apiJwt']], function(){
    Route::post('auth/logout',[AuthController::class.'logout'])->name('logout');
    //Demais routes, como de cadastros, outras ações do sistema, ficam aqui!
    Route::get('users',[UserController::class,'index']); //URL nas routes API sempre será api/algumaCoisa(ex: api/users)
});

//post('/url',[nomeController::class,'metodo'])->middleware("nome middleware") //Laravel8
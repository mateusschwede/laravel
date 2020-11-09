<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('envio-email',function(){
    $user = new stdClass(); //Cria-se objeto vazio, para teste de informar parâmetros de destinatário. O correto é enviar parâmetros de um Model
    $user->name = 'nomeDestinatário';
    $user->email = 'emailDestinatario';
    //return new \App\Mail\newLaravelTips($user); //Descomentar para testar template do email na view
    \Illuminate\Support\Facades\Mail::send(new \App\Mail\newLaravelTips($user)); //Descomentar para enviar email de fato
});
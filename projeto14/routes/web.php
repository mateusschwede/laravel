<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('envio-email',function(){
    $user = new stdClass();
    $user->name = 'nomeDestinatário';
    $user->email = 'emailDestinatario';
    //\Illuminate\Support\Facades\Mail::send(new \App\Mail\newLaravelTips($user));
    \App\Jobs\newLaravelTips::dispatch($user)->delay(now()->addSeconds('15'));
});
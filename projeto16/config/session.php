<?php
use Illuminate\Support\Str;

return [
    'driver' => env('SESSION_DRIVER', 'cookie'),
    /*Tipos de configuração:
    - File: Arquivo texto gravado no servidor(Faz leituras em disco, ocupa servidor, mais lento)
    - cookie
    - database: Grava alterações em BD(Necessária table/migration específica)
    - apc, memcached, dynamodb, array
    - redis: Grava em memória(Para grandes aplicações)    
    */

    'lifetime' => env('SESSION_LIFETIME', 120), //Tempo de duração da sessão(120min)
    'expire_on_close' => false,

    'encrypt' => false,

    'files' => storage_path('framework/sessions'),

    'connection' => env('SESSION_CONNECTION', null),

    'table' => 'sessions',

    'store' => env('SESSION_STORE', null),

    'lottery' => [2, 100],

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    'path' => '/',

    'domain' => env('SESSION_DOMAIN', null),

    'secure' => env('SESSION_SECURE_COOKIE'),

    'http_only' => true,

    'same_site' => 'lax',
];
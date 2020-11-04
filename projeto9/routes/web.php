<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site.home');
});

Route::get('/painel', function () {
    return view('admin.home');
});
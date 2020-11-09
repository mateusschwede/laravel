<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialiteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login/facebook', [SocialiteController::class, 'redirectToProvider']);
Route::get('login/facebook/callback', [SocialiteController::class, 'handleProviderCallback']);

Route::get('login/google', [SocialiteController::class, 'redirectToProviderGoogle']);
Route::get('login/google/callback', [SocialiteController::class, 'handleProviderCallbackGoogle']);
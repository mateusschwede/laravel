<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('form','upload.form');
Route::post('upload',[UploadController::class,'upload'])->name('upload');

Route::resource('produtos',ProductController::class)->names('products')->parameters(['produtos'=>'products']);
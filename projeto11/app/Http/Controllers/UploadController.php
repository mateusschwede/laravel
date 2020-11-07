<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UploadController extends Controller {
    
    public function upload(Request $request) {
        //dd($request->all());
        //dd($request->file('arquivo'));
        $request->file('arquivo')->store('pastaTeste');
    }
}
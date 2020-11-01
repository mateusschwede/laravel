<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FlightController extends Controller {

    public function update(Request $request) {
        $request->user()->name; //User autenticado, acessá-lo por meio da instância
    }
}
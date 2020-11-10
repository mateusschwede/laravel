<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller {
    public function session() {
        //Formas de add dados na sessão(Tanto faz qual usar, mas manter o padrão de uma em todo projeto)
        session(['name'=>'exNome']); //Helper
        echo session('name');

        session()->put('lastname','exSobrenome'); //Helper
        echo session()->get('lastname');

        Session::put('email','exEmail'); //Facades
        echo Session::get('email');

        Session::put(['cart_product'=>'1','cart_quantity'=>2,'price'=>199]); //Session com vários dados em array associativo
        Session::forget(['price','cart_quantity']); //Eliminar posições

        //Testes com Sessões:
        if(Session::has('email')) { //Verificar se campo existe e se possui valor
            echo "<p>Email válido(Campo existe e tem valor)</p>";
        } else {
            echo "<p>Email inválido</p>";
        }

        if(Session::exists('email')) { //Verificar somente se campo existe(Diferente do has, aceita null)
            echo "<p>Email válido(Campo existe)</p>";
        } else {
            echo "<p>Email inválido</p>";
        }

        //Sessão Flash(Exibe 1 vez e apaga automaticamente)
        Session::flash('message','Sessão flash criada!');
        echo Session::get('message'); //Mostra 1 vez e depois apaga automaticamente

        //dd(Session::all(),session()->all()); //Acesso via Facade(uso ideal em controllers, backend), Acesso via Helper(Helper não necessita 'use', usado em templates engine, frontend)
    }
}
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    
    public function dashboard() {
        
        if (Auth::check() === true) { //Se está logado, return true, senão redireciona ao form de login
            //dd(Auth::user());
            return view('admin.dashboard'); //diretorio.view
        }
        return redirect()->route('admin.login');
    }

    public function showLoginForm() {
        return view('admin.formLogin');
    }

    public function login(Request $request) {
        //dd($request->all());

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->withInput()->withErrors(['Email inválido']);
        }

        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        //Auth::attempt($credentials); //Faz tentativa de login
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin');
        }
        return redirect()->back()->withInput()->withErrors(['Dados inválidos']); //Volta 1 url
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin');
    }
}
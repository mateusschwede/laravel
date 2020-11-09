<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    
    public function dashboard() {
        
        if (Auth::check() === true) {
            return view('admin.dashboard');
        }
        return redirect()->route('admin.login');
    }

    public function showLoginForm() {
        return view('admin.formLogin');
    }

    public function login(Request $request) {

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            //return redirect()->back()->withInput()->withErrors(['Email inválido']);
            $login['success'] = false;
            $login['message'] = 'Email inválido';
            echo json_encode($login); //Feedback da requisição precisa ser json, por causa do dataType informado
            return;
        }

        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if (Auth::attempt($credentials)) {
            //return redirect()->route('admin');
            $login['success'] = true;
            echo json_encode($login);
            return;
        }
        //return redirect()->back()->withInput()->withErrors(['Dados inválidos']);
        $login['success'] = false;
        $login['message'] = 'Dados inválidos';
        echo json_encode($login);
        return;
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin');
    }
}
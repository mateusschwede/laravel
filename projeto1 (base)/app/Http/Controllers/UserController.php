<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; //Import Hash para senhas
use App\Models\User; //Import Model User.php

class UserController extends Controller {
    public function listUser() {
        /*$user = new User();
        $user->name = 'Mateus';
        $user->email = 'mateus1908.schwede@gmail.com';
        $user->password = Hash::make('123');
        $user->save();*/

        //select user where id=1 somente o 1º que encontrar, abaixo
        $user = User::where('id','=',1)->first();
        return view('listUser',[
            'user' => $user
            //var visao => var controller
        ]);
    }
}
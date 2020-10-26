<?php
namespace App\Http\Controllers\Form;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller {
    
    public function listAllUsers() {
        $users = User::all();
        return view('listAllUsers',[
            'users' => $users
        ]);
    }

    public function listUser(User $user) {
        return view('listUser',[
            'user' => $user
        ]);
    }
}
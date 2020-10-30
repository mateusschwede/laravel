<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function index() {
    }

    public function create() {
    }

    public function store(Request $request) {
    }

    public function show($id) {
        $user = User::where('id',$id)->first();
        //dd($user);

        $address = $user->address()->first();
        if ($address) {
            // O correto seria levar isso à uma view, isso fora feito somente para simplificar
            echo "<p>Nome end: {$address->street},{$address->number} {$address->city}/{$address->state}</p>";
        }

        $posts = $user->posts()->get(); //retorna vários
        if ($posts) {
            // O correto seria levar isso à uma view, isso fora feito somente para simplificar
            foreach ($posts as $post) {
                echo "<p>(Ida)Post {$post->id}- {$post->title}, {$post->content}</p>";
            }
        }
    }

    public function edit($id) {
    }

    public function update(Request $request, $id) {
    }

    public function destroy($id) {
    }
}
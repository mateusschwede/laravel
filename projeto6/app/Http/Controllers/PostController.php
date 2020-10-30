<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {

    public function index() {
    }

    public function create() {
    }

    public function store(Request $request) {
    }

    public function show(Post $post) {
        echo "<p>(Volta)Post {$post->id}- {$post->title}, {$post->content}</p>";

        $user = $post->author()->first();
        if ($user) {
            // O correto seria levar isso à uma view, isso fora feito somente para simplificar
            echo "<p>(Volta)Author {$user->name}, {$user->email}</p>";
        }

        $categories = $post->categories()->get();
        if ($categories) {
            foreach ($categories as $category) {
                echo "<p>(Ida)Category {$category->id} do Post {$post->id}- {$category->title}, {$category->description}</p>";
            }
        }
    }

    public function edit(Post $post) {
    }

    public function update(Request $request, Post $post) {
    }

    public function destroy(Post $post) {
    }
}
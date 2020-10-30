<?php
namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {

    public function index() {
    }

    public function create() {
    }

    public function store(Request $request) {
    }

    public function show(Category $category) {
        echo "<p>(Volta)Category {$category->id}- {$category->title}, {$category->description}</p>";

        $posts = $category->posts()->get();
        if ($posts) {
            foreach ($posts as $post) {
                echo "<p>(Volta)Post {$post->id} da Category {$category->id}- {$post->title}, {$post->description}</p>";
            }
        }
    }

    public function edit(Category $category) {
    }

    public function update(Request $request, Category $category) {
    }

    public function destroy(Category $category) {
    }
}
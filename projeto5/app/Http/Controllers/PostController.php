<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller {
    
    public function showForm() {
        return view('form');
    }

    public function debug(Request $request) {
        //dd($request->all());
        //dd($request->except(['_token']);) //Ou only(['somente campos que quero receber]);
        
        $post = new Post();
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->content = $request->content;
        $post->save();
        
        //$post->create([$request->except(['_token'])]); //Caso opte pelo atributo 'fillable' na Model 'Post'
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('index', [
            'posts' => $posts,
        ]);
    }

    public function show()
    {
        //first 
       //take the id from url param
       $request = request();
       $postId = $request->post;
        //sec
       //query to retrieve the post by id
       $post = Post::find($postId);
       // $post = Post::where('id', $postId)->get();
       // $postSecond = Post::where('id', $postId)->first();
        //theard
        //key->value 
       //send the value to the view
       return view('show',[
           'post' => $post,
       ]);
    }
}

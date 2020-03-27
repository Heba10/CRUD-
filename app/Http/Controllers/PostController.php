<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

use App\Post;
use App\User;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', [
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
       return view('posts.show',[
           'post' => $post,
       ]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create', [
            'users' => $users
        ]);
    }

    public function store(PostRequest $request)
    {
         //get the request data
         $request = request();

         //store the request data in the db
         Post::create([
             'title' => $request->title,
             'description' =>  $request->description,
             'user_id' =>  $request->user_id,
         ]);

         return redirect()->route('posts.index');
    }
  

public function edit() {
    $users = User::all();
    $post = Post::find(request()->post);

    return view('posts.edit', [
        'users' => $users,
        'post' => $post
    ]);
}

public function update() {
    $request = request();

    Post::where('id', $request->post)->update([
        'title' => $request->title,
        'description' => $request->description,
        'user_id' => $request->user_id
    ]);

    return redirect()->route('posts.index');
}


public function destroy() {
    $request = request();

    Post::where('id', $request->post)->delete();

    return redirect()->route('posts.index');
}


}

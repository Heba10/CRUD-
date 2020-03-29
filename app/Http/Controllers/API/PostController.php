<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

use App\Http\Resources\PostResource;
use App\Post;

class PostController extends Controller
{
    public function index() {

        $posts=Post::all();
        $postResource =PostResource::collection($posts);

        return $postResource;

    }
    public function show() {

      $postId =request()->post;
      $post =Post::find($postId);
      return new PostResource($post);
    }

    
    public function store(PostRequest $request) {

      $post = Post::create($request->only(['title', 'description', 'user_id']));

      return new PostResource($post);
  }


}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Resources\PostResource;

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
}

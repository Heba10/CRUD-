@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('posts.update', ['post' => $post->id])}}" style="width: 60%; margin: 3rem auto;">
    @csrf
    {{method_field('PUT')}}
    <div class="form-group">
      <label >Title</label>
      <input name="title" value="{{$post->title}}" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <textarea name="description" class="form-control">{{$post->description}}</textarea>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Users</label>
      <select name="user_id" class="form-control" value="{{$post->user_id}}">
        @foreach($users as $user)  
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>

@endsection
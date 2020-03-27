@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('posts.store')}}">
    @csrf
    <div class="form-group">
      <label >Title</label>
      <!-- put name to can use it in controler function store -->
      <input name="title" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <textarea name="description" class="form-control">

      </textarea>
    

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
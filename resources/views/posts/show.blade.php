@extends('layouts.app')

@section('content')
    <div class="card" style="width: 18rem;">
        <div class="action">
        <form method="POST" action="{{ route('pay')}}" >
        {{ csrf_field() }}
        <input   type="hidden" name="title" value='55'/>
        <input type="hidden" name="description" value={{$post->description}} />
        <button class="btn btn-success" type="submit">Buy Now</button>
        </form>

        <h5 class="card-title">{{$post->title}}</h5>
          <p class="card-text">{{$post->description}}</p>
        </div>
      </div>
@endsection

@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-dark">Go Back</a>
    <div class="card p-3 my-4">
        <div class="card-body">
            <h3 class="card-title">{{$post->title}}</h3>
            <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">
            <small>Created on {{$post->created_at}} by {{$post->user->name}}</small>
            <hr>
            <p class="card-text">{!!$post->body!!}</p>
        </div>

    </div>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user->id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>

            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection



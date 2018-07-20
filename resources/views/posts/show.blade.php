@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-success">Back to blog</a>
    <pre>{{var_dump($post)}}</pre>
    <h1>{{$post->title}}</h1>
    {{-- The !! below means that the html created by ckeditor is parsed --}}
    <p>{!! $post->body !!}</p>
    <small>Written on <strong>{{parseDate($post->created_at)}}</strong></small>
    <hr>
    {{-- {{Auth::user()->id}}
    <br>
    {{ $post->user_id}} --}}
    {{-- Do not show if user is guest --}}
    @if(!Auth::guest())
    {{-- Only show the edit/delete if the post belongs to current user --}}
      @if(Auth::user()->id == $post->user_id)
        <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit post</a>
        {!! Form::open([
          'action' => ['PostsController@destroy', $post->id], 
          'method' => 'POST', 
          'class' => 'pull-right']) !!}
        <!-- The hidden field here is to 'spoof' a PUT request, as the update method can only be a PUT or patch -->
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete post', ['class' => 'btn btn-danger'])}}
        {!! Form::close() !!}
        @endif
    @endif
@endsection
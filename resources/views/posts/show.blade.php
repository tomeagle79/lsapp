@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-success">Back to blog</a>
    <h1>{{$post->title}}</h1>
    {{-- The !! below means that the html created by ckeditor is parsed --}}
    <p>{!! $post->body !!}</p>
    <small>Written on {{App\Post::parseDate($post->created_at)}}</small>
    <hr>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit post</a>
@endsection
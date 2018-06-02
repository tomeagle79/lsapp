@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-success">Back to blog</a>
    <h1>{{$post->title}}</h1>
    <small>Written on {{App\Post::parseDate($post->created_at)}}</small>
    <p>{{$post->body}}</p>
    
@endsection
@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-success">Back to blog</a>
    <h1>{{$post->title}}</h1>
    <small>Written on {{App\Post::parseDate($post->created_at)}}</small>
    {{-- The !! below means that the html created by ckeditor is parsed --}}
    <p>{!! $post->body !!}</p>
    
@endsection
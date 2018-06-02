@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    <p>You have {{count($posts)}} posts</p>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>Written on {{$post->created_at}}</small>
                <p>{{$post->body}}</p>
            </div>
        @endforeach
        {{-- Output the pagination --}}
        {{$posts->links()}} 
    @else
        <p>No posts founds</p>
    @endif
@endsection
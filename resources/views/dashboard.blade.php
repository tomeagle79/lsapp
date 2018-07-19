@extends('layouts.app') @section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
          <a href="/posts/create" class="btn btn-primary">Create post</a>
          <h3>Your Blog Posts</h3>
        </div>

        <table class="table table-striped">
          <tr>
            <th>Title</th>
            <th></th>
            <th></th>
          </tr>
          @foreach($posts as $post)
          <tr>
            <th>{{$post->title}}</th>
            <th>
              <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit post</a>
            </th>
            <th></th>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
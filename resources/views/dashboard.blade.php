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
        @if(count($posts) > 0)
        <table class="table table-striped">
          <tr>
            <th>Title</th>
            <th></th>
            <th></th>
          </tr>
          @foreach($posts as $post)
          <tr>
            <td>
              <a href="/posts/{{$post->id}}">{{$post->title}}</a>
            </td>
            <td>
              <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit post</a>
            </td>
            <td>
              {!! Form::open([ 'action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
              <!-- The hidden field here is to 'spoof' a PUT request, as the update method can only be a PUT or patch -->
              {{Form::hidden('_method', 'DELETE')}} {{Form::submit('Delete post', ['class' => 'btn btn-danger'])}} {!! Form::close() !!}
            </td>
          </tr>
          @endforeach
        </table>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
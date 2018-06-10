<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use DB; // use SQL queries

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all(); // Fetch all data available
        $posts = Post::orderBy('created_at', 'desc')->paginate(1); // Show pagination
        //$posts = Post::orderBy('title', 'desc')->get(); // Order posts by title
        //$posts = Post::orderBy('title', 'desc')->take(1)->get(); // Get the first post
        //return Post::where('title', 'Another bloody post')->get(); // Just get the post with title 'Another bloody post'
        // Following uses the DB plugin to do SQL queries
        //$posts = DB::select('SELECT * FROM posts WHERE `id` = 4'); // return the post with id of 4
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required', 
            'body' => 'required'
            ]);

            // Create post
            $post = new Post;
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->save();

            // redirect the user to the posts page and show confirmation message
            return redirect('/posts')->with('success', 'Post created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

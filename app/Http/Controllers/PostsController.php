<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use DB; // use SQL queries

class PostsController extends Controller
{
    /** 
     * * Create a new controller instance. 
     * 
     * 
     * 
     * 
     * * @return void 
     * 
     * */
    // Prevent unregistered user from creating blogposts
    
    public function __construct() 
    { 
      // Second argument here is the exceptions to the rule
      $this->middleware('auth', ['except' => ['index', 'show']]); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all(); // Fetch all data available
        //$posts = Post::orderBy('title', 'desc')->get(); // Order posts by title
        //$posts = Post::orderBy('title', 'desc')->take(1)->get(); // Get the first post
        //return Post::where('title', 'Another bloody post')->get(); // Just get the post with title 'Another bloody post'
        // Following uses the DB plugin to do SQL queries
        //$posts = DB::select('SELECT * FROM posts WHERE `id` = 4'); // return the post with id of 4
        $posts = Post::orderBy('created_at', 'desc')->paginate(10); // Show pagination if above x posts paginate(x) 
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
        // This function is called by the action attribute of the posts form, passing in the title and body content
        $this->validate($request, [
            'title' => 'required', 
            'body' => 'required',
            // below ensures that it's an image format|not required|max image size
            'cover_image' => 'image|max:1999'
        ]);

        // Handle file upload
        if ($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('cover_image')->move('public/cover_images', $fileNameToStore); // Laravel 5.3+ uses storeAs

        } else {
            $fileNameToStore = 'defaultimage.jpg';
        }

        // Create post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        // gets user id from logged in user and adds to post
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
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
        $post = Post::find($id);
        // check for correct user
        if(auth()->user()->id !== $post->user_id ){
          return redirect('/posts')->with('error', 'Unauthorised access - you cannot edit this post');
        }
        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required', 
            'body' => 'required'
            ]);

            // Create post
            $post = Post::find($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->save();

            // redirect the user to the posts page and show confirmation message
            return redirect('/posts')->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id); 
  
        // check for correct user 
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorised access - you cannot delete this post'); 
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Post deleted');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
    $posts = Post::paginate(1);
    return view('include.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('include.posts.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
          ]);
          Post::create($request->all());
          return redirect()->route('posts.index')
            ->with('success','Post created successfully.');
          
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::find($id);
        return view('include.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::find($id);
    return view('include.posts.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
      ]);
      $post = Post::find($id);
      $post->update($request->all());
      return redirect()->route('posts.index')
        ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
  {
    $post = Post::find($id);

    if ($post) {
        $post->delete();
        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    } else {
        // Handle the case where the post is not found
        return redirect()->route('posts.index')
            ->with('error', 'Post not found');
    }
  }
}

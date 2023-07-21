<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
   
    public function index()
    {
        return Inertia::render('Blogs/Index', [
            'posts'=> Post::with('user:id,name')->latest()->get()
        ]); 
        ///return response()->json(['mensaje'=>'bootcamt con laravel']);
    }

  


    public function store(Request $request)
    {
        $validated= $request->validate([
            'title'=> 'required|string|max:100',
            'body'=> 'required|string|max:300'
        ]);

        $request->user()->posts()->create($validated);

        return redirect (route('posts.index'));

    }







    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        $validated= $request->validate([
            'title'=> 'required|string|max:100',
            'body'=> 'required|string|max:300'
        ]);

        $post->update( $validated);
        return redirect (route('posts.index'));
    }


    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect (route('posts.index'));
    }
}

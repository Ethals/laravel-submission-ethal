<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('tags', 'category')->latest()->paginate(10);

        return view('posts', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::with('tags')->findOrFail($id);
        
        return view('show', compact('post'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('tags', 'category')->latest()->paginate(10);

        return view('articles', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::with('tags')->findOrFail($id);
        
        return view('show', compact('article'));
    }
}


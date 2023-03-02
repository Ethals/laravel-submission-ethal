<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')->paginate(20);

        return view('dashboard.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('dashboard.articles.create', compact('categories'));
    }
    
    public function store(Request $request)
    {
        $tags = explode(',', $request->tags);

        if ($request->has('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename, 'public');
        }
        
        $article = auth()->user()->articles()->create([
            'title' => $request->title,
            'image' => $filename ?? null,
            'desc' => $request->desc,
            'category_id' => $request->category
        ]);

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        }

        return redirect('/dashboard/articles')->with('success', 'Berhasil upload article!');
    }

    public function show(Article $article)
    {
        return view('dashboard.articles.detail', [
            'article' => $article
        ]);
    }

    public function edit(article $article)
    {
        $categories = Category::all();
        $tags = $article->tags->implode('name', ', ');

        return view('dashboard.articles.edit', [
            'article' => $article,
            'categories' => Category::all()
        ]);
        // return view('dashboard.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $tags = explode(',', $request->tags);

        if ($request->has('image')) {
            Storage::delete('public/uploads/' . $article->image);
            
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename, 'public');
        }

        $article->update([
            'title' => $request->title,
            'image' => $filename ?? $article->image,
            'desc' => $request->desc,
            'category_id' => $request->category
        ]);

        $newTags = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            array_push($newTags, $tag->id);
        }
        $article->tags()->sync($newTags);

        return redirect('/dashboard/articles')->with('success', 'Berhasil mengubah article');

    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::delete('public/uploads/' . $article->image);
        }

        $article->tags()->detach();
        $article->delete();

        return redirect('/dashboard/articles')->with('success', 'article has been deleted!');

    }
}

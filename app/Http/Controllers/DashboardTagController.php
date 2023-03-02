<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Requests\StoreTagRequest;

class DashboardTagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(20);

        return view('dashboard.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('dashboard.tags.create');
    }

    public function store(StoreTagRequest $request)
    {
        Tag::create($request->validated());

        return redirect('/dashboard/tags')->with('success', 'Berhasil upload tags!');

    }

    public function edit(Tag $tag)
    {
        return view('dashboard.tags.edit', compact('tag'));
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        return redirect('/dashboard/tags')->with('success', 'Berhasil update tags!');

    }

    public function destroy(Tag $tag)
    {
        foreach ($tag->posts as $post) {
            $post->tags()->detach();
        }

        if (!$tag->posts()->count()) {
            $tag->delete();
        }

        return redirect('/dashboard/tags')->with('success', 'Berhasil delete tags!');

    }
}

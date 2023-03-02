<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;

class DashboardCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(20);

        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect('/dashboard/categories')->with('success', 'Berhasil upload post!');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect('/dashboard/categories')->with('success', 'Berhasil ubah!');    }

    public function destroy(Category $category)
    {
        if ($category->posts()->count()) {
            return back()->withErrors(['error' => 'Cannot delete, category has posts.']);
        }

        $category->delete();

        return redirect('/dashboard/categories')->with('success', 'Berhasil Hapus Category!');
    }
}

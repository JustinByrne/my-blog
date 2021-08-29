<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::withCount('articles')->orderBy('name')->paginate(15);

        return view('category.index', compact('categories'));
    }

    public function create(): View
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());

        return redirect()->route('categories.index');
    }

    public function show(Category $category): View
    {
        return view('category.show', compact('category'));
    }

    public function edit(Category $category): View
    {
        return view('category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category): RedirectResponse
    {
        abort_if($category->id == 1, 403);
        
        $category->delete();

        return redirect()->route('categories.index');
    }

    public function public(Category $category)
    {
        $articles = Article::with('category', 'tags')
            ->whereHas('category', function ($query) use ($category) {
                $query->where('name', $category->name);
            })
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->paginate(7);
        
        $pageTitle = "Category: " . $category->name;
        
        return view('home', compact('articles', 'pageTitle'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::with('category', 'tags')->orderBy('updated_at')->get();

        return view('category.index', compact('categories'));
    }

    public function create(): View
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());

        return redirect()->route('category.index');
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

        return redirect()->route('category.index');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('category.index');
    }
}

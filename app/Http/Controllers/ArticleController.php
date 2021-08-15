<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::with('category', 'tags')->orderBy('updated_at')->get();

        return view('article.index', compact('articles'));
    }

    public function create(): View
    {
        return view('article.create');
    }

    public function store(ArticleRequest $request): RedirectResponse
    {
        Article::create($request->validated());

        return redirect()->route('article.index');
    }

    public function show(Article $article): View
    {
        return view('article.show', compact('article'));
    }

    public function edit(Article $article): View
    {
        return view('article.edit', compact('article'));
    }

    public function update(ArticleRequest $request, Article $article): RedirectResponse
    {
        $article->update($request->validated());

        return redirect()->route('article.index');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route('article.index');
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Article;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::with('category', 'tags')->orderBy('updated_at', 'DESC')->paginate(15);

        return view('article.index', compact('articles'));
    }

    public function create(): View
    {
        $categories = Category::orderBy('name')->get();
        
        return view('article.create', compact('categories'));
    }

    public function store(ArticleRequest $request): RedirectResponse
    {
        $article = Auth::user()->articles()->create($request->validated());

        if ($request->action == 'publish') {
            $article->published_at = today();
        } else {
            $article->published_at = null;
        }

        $article->save();

        $article->tags()->sync(json_decode($request->tags));

        return redirect()->route('articles.index');
    }

    public function show(int $year, int $month, int $day, string $slug): View
    {
        $article = Article::with('category', 'tags')
            ->whereYear('published_at', $year)
            ->whereMonth('published_at', $month)
            ->whereDay('published_at', $day)
            ->where('slug', $slug)
            ->firstOrFail();
        
        return view('article.show', compact('article'));
    }

    public function edit(Article $article): View
    {
        $categories = Category::orderBy('name')->get();
        
        return view('article.edit', compact('article', 'categories'));
    }

    public function update(ArticleRequest $request, Article $article): RedirectResponse
    {
        $article->update($request->validated());

        if ($request->action == 'publish') {
            $article->published_at = today();
        } else {
            $article->published_at = null;
        }

        $article->save();

        $article->tags()->sync(json_decode($request->tags));

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route('articles.index');
    }
}

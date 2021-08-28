<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        $articles = Article::with('category', 'tags')->whereNotNull('published_at')->orderByDesc('published_at')->paginate(7);
        
        return view('home', compact('articles'));
    }
}

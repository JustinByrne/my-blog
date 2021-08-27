<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        $articles = Article::whereNotNull('published_at')->get();
        
        return view('home', compact('articles'));
    }
}

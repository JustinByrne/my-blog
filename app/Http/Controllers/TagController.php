<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    public function index(): View
    {
        $tags = Tag::withCount('articles')->orderBy('updated_at')->paginate(15);

        return view('tag.index', compact('tags'));
    }

    public function create(): View
    {
        return view('tag.create');
    }

    public function store(TagRequest $request): RedirectResponse
    {
        Tag::create($request->validated());

        return redirect()->route('tags.index');
    }

    public function show(Tag $tag): View
    {
        return view('tag.show', compact('tag'));
    }

    public function edit(Tag $tag): View
    {
        return view('tag.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag): RedirectResponse
    {
        $tag->update($request->validated());

        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return redirect()->route('tags.index');
    }
}

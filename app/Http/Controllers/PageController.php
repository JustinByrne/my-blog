<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use Illuminate\Http\RedirectResponse;

class PageController extends Controller
{
    public function index(): View
    {
        $pages = Page::orderBy('updated_at')->paginate(15);

        return view('page.index', compact('pages'));
    }

    public function create(): View
    {
        $max_order = (! is_null(Page::max('order')) && Page::max('order') >= 0) ? Page::max('order') : 0;

        return view('page.create', compact('max_order'));
    }

    public function store(PageRequest $request): RedirectResponse
    {
        $page = Page::create($request->validated());

        if ($request->action == 'publish') {
            $page->published_at = today();
        } else {
            $page->published_at = null;
        }

        $page->save();

        return redirect()->route('pages.index');
    }

    public function show(Page $page): View
    {
        //
    }

    public function edit(Page $page): View
    {
        return view('page.edit', compact('page'));
    }

    public function update(PageRequest $request, Page $page): RedirectResponse
    {
        $page->update($request->validated());

        if ($request->action == 'publish') {
            $page->published_at = today();
        } else {
            $page->published_at = null;
        }

        $page->save();
        
        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}

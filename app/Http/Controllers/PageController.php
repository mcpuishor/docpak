<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use App\Models\Section;

class PageController extends Controller
{
    public function index()
    {
        $page = Page::query()
            ->where('section_id', 1)
            ->where('slug', 'index')
            ->firstOrFail();

        return view('index')
            ->with([
                'page' => $page,
            ]);
    }

    public function section(Section $section)
    {
        $page = Page::query()
            ->where('section_id', $section->id)
            ->firstOrFail();

        return view('page', 'section');
    }

    public function page(Section $section, Page $page)
    {
        return view('page')
                ->with(compact('page', 'section'));
    }

    public function edit(Section $section, Page $page)
    {
        return view('edit')
                ->with(compact('page', 'section'));
    }

    public function store(Page $page, PageRequest $request)
    {
        $page->update($request->validated());

        return redirect()->route('page', ['section' => $page->section->slug, 'page' => $page->slug]);
    }
}

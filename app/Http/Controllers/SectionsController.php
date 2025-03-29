<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPageRequest;
use App\Http\Requests\SectionRequest;
use App\Models\Page;
use App\Models\Section;

class SectionsController extends Controller
{
    public function create()
    {
        $sections = Section::all()->map(function ($section) {
            return ['label' => $section->title, 'value' => $section->id];
        })->toArray();

        return view('sections.create')->with(['sections' => $sections]);
    }

    public function store(SectionRequest $request)
    {
        Section::create($request->validated());

        return redirect()->route('sections.create');
    }

    public function page(NewPageRequest $request)
    {
        Page::create(
            array_merge($request->validated(), ['content' => ' '])
        );

        return redirect()->route('sections.create');
    }
}

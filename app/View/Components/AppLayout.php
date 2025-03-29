<?php

namespace App\View\Components;

use App\Models\Section;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class AppLayout extends Component
{
    public function render()
    {

        return view('layouts.app')
            ->with(['menu' => $this->getMenu()]);
    }

    private function getMenu(): Collection
    {
        return Section::query()
            ->where('id', '>', 1)
            ->with('pages')
            ->get();
    }
}

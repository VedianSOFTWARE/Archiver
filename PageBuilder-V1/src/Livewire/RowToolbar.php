<?php

namespace Vedian\Cms\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;
use Illuminate\Support\Str;

class RowToolbar extends Component
{
    public Collection $rows;

    public function mount()
    {
        $this->rows = collect();
    }

    public function addRow()
    {
        $this->rows->push('123');
    }

    public function render()
    {
        return view('vedian::livewire.row-toolbar');
    }
}

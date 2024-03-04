<?php

namespace Vedian\Cms\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class TitleSlugComposer extends Component
{
    public $title = '';
    public $slug = '';

    public function makeSlug()
    {
        $this->slug = Str::slug($this->title, '-');
    }

    public function modifySlug()
    {
        $this->slug = Str::slug($this->slug, '-');
    }

    public function render()
    {
        return view('vedian::livewire.title-slug-composer');
    }
}

<?php

namespace Vedian\Cms\View;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Vedian\Cms\Enumerations\Status;

class PageStatus extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct(
        public $options = []
    )
    {
        $this->options = Status::cases();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('vedian::components.page-status');
    }
}

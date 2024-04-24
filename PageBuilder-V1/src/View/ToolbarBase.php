<?php

namespace Vedian\Cms\View;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

abstract class ToolbarBase extends Component
{
    public array $actions = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('vedian::components.toolbar-base');
    }
}

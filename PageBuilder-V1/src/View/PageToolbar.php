<?php

namespace Vedian\Cms\View;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageToolbar extends ToolbarBase
{
    public array $actions = [
        'addRow',
    ];
}

<?php

namespace Vedian\Cms\Contracts\View;

use Illuminate\Support\Collection;

interface HtmlElement
{
    public function render();
    public function viewPath();

}

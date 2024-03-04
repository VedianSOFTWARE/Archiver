<?php

namespace Vedian\Cms\Services;

use Vedian\Cms\Contracts\StylingServiceContract;

class StylingService implements StylingServiceContract
{
    public function add($key, $value)
    {
        $this->$key = $value;
    }
}

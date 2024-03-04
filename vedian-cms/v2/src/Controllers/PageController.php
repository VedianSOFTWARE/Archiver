<?php

namespace Vedian\Cms\Controllers;

use ReflectionClass;
use Vedian\Cms\Contracts\StylingServiceContract;
use Vedian\Cms\Services\ReflectionService;
use Vedian\Cms\Services\StylingService;
use Vedian\Cms\View\Html\Container;

/**
 * Class PageController
 * @package Vedian\Cms\Controllers
 */
class PageController extends Controller
{
    /**
     * Create a new page.
     *
     * @param PageBuilder $pb The page Service instance.
     * @return int The created page ID.
     */
    public function create()
    {
        return view('vedian::page.create');
    }
}

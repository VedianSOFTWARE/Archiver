<?php

namespace Vedian\Cms\View;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;
use Vedian\Cms\Contracts\StylingServiceContract;
use Vedian\Cms\Contracts\ElementContract;

class View extends Component implements ElementContract
{
    protected string $name = 'default';


    public function __construct(
        public StylingServiceContract $styling,
    ) {
    }

    private function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function render(): View|Htmlable|\Closure|string
    {
        return view("vedian::parts.{$this->getName()}");
    }
}

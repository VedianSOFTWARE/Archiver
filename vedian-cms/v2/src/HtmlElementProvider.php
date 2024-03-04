<?php

namespace Cms;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nette\Utils\Html;
use ReflectionClass;
use Vedian\Cms\Contracts\ReflectionServiceContract;
use Vedian\Cms\Contracts\StylingServiceContract;
use Vedian\Cms\Contracts\View\HtmlContainer;
use Vedian\Cms\Contracts\View\HtmlElement;
use Vedian\Cms\Services\ReflectionService;
use Vedian\Cms\Services\StylingService;
use Vedian\Cms\View\Html\Container;
use Vedian\Cms\View\Html\Element;

class HtmlElementProvider extends ServiceProvider
{
    public $singletons = [
        HtmlContainer::class => Container::class,
        HtmlElement::class => Element::class
    ];

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/vedian.php', 'vedian');

        $this->app->singleton(HtmlContainer::class, Container::class);
        $this->app->singleton(HtmlElement::class, Element::class);
        $this->app->singleton(ReflectionServiceContract::class, ReflectionService::class);


        // $this->app->bind(ReflectionServiceContract::class, function ($app) {
        //     return new ReflectionService(new ReflectionClass(Container::class));
        // });

        $this->app->when(Container::class)
            ->needs('$serviceContracts')
            ->give(collect([
                StylingService::class
            ])->map(function ($arg, $key) {
                return $arg;
            }));

        $this->app->when(Container::class)
            ->needs(ReflectionServiceContract::class)
            ->give(fn () => new ReflectionService(new ReflectionClass(Container::class)));
        // $this->app->bind(ContainerContract::class, Container::class);
        // $this->app->bind(ElementContract::class, ContainerContract::class);

        // $this->app->bind(ReflectionServiceContract::class, ReflectionService::class);

        // $this->bindViewComponents(
        //     Container::class,
        //     [
        //         StylingService::class
        //     ]
        // );
    }

    protected function registerHtmlElementDriver()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Register blade components
        // Blade::componentNamespace('Cms\\View', 'vedian');
    }
}

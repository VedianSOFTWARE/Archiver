<?php

namespace Cms;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as Provider;
use Livewire\Livewire;
use Livewire\Mechanisms\HandleComponents\ComponentContext;
use Vedian\Cms\Contracts\StylingServiceContract;
use Vedian\Cms\Contracts\ModelContract;
use Vedian\Cms\Contracts\ComponentContract;
use Vedian\Cms\Contracts\ServiceContract;
use Vedian\Cms\Livewire\RowToolbar;
use Vedian\Cms\Livewire\TitleSlugComposer;
use Vedian\Cms\Models\Page;
use Vedian\Cms\Services\StylingService;
use Vedian\Cms\Services\PageService;
use Vedian\Cms\Services\ContainerService;
use Vedian\Cms\View\Component\Container;
use Vedian\Cms\View\Component\Styling;
use Vedian\Cms\View\ContainerComponent;

/**
 * Class CmsServiceProvider
 *
 * This class is the service provider for the Cms package.
 * It registers and bootstraps the necessary services and components.
 *
 * @package Cms
 */
class CmsServiceProvider extends Provider
{
    protected $cmsBindings = [
    ];


    public function register()
    {
        $this->bindings();
        $this->mergeConfigFrom(__DIR__ . '/../config/vedian.php', 'vedian');
    }

    /**
     * This code block represents the current selection.
     * It was generated as a result of a previous interaction with GitHub Copilot.
     * Please refer to the previous messages for more context.
     */
    private function getCmsBindings()
    {
        return $this->walkArrayToCollection($this->cmsBindings);
    }

    private function walkArrayToCollection($array)
    {
        return collect($array)->map(function ($item) {
            if (is_array($item)) {
                return $this->walkArrayToCollection($item);
            }
            return $item;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->vendorLoaders();
        $this->vendorPublishers();
        $this->vendorBladeComponents();

        Livewire::component('vedian::title-slug', TitleSlugComposer::class);
        Livewire::component('vedian::row-toolbar', RowToolbar::class);
    }

    /**
     * Bind the necessary classes to the service container.
     *
     * @return void
     */
    protected function bindings()
    {
        $this->getCmsBindings()->each(function ($bindings, $needs) {
            $bindings->each(function ($give, $when) use ($needs) {
                $this->app->when($when)
                    ->needs($needs)
                    ->give($give);
            });
        });


        // $this->app->bind(CssContract::class, Container::class);
        // dd(123);
        // $this->app->bind(Container::class, Css::class);
        // $this->app->bind(CssContract::class, CssContainer::class);
        // $this->app->bind(CssContract::class, Css::class);
        // $this->app->bind(CssContainerContract::class, CssContainer::class);

        // /**
        //  * Binds the BuilderContract interface to the PageContract class for PageService.
        //  *
        //  * @var \Cms\Contracts\ModelContract $ServiceContract
        //  * @var \Cms\Contracts\PageContract $pageContract
        //  */

        // /**
        //  * Binds the BuilderContract interface to the RowContract class for RowService.
        //  *
        //  * @var \Cms\Contracts\ModelContract $ServiceContract
        //  * @var \Cms\Contracts\RowContract $rowContract
        //  */
        // $this->app->when(RowService::class)
        //     ->needs(ModelContract::class)
        //     ->give(Row::class);

        // /**
        //  * Binds the BuilderContract interface to the ColumnContract class for ColumnService.
        //  *
        //  * @var \Cms\Contracts\ModelContract $ServiceContract
        //  * @var \Cms\Models\ColumnContract $columnContract
        //  */
        // $this->app->when(ColumnService::class)
        //     ->needs(ModelContract::class)
        //     ->give(Column::class);

        // $this->app->bind(CssContract::class, Css::class);
        // $this->app->bind(CssContainerContract::class, Container::class);
        // $this->getGiveBinding()->each(function ($concrete, $abstract) {
        //     $this->app->bind($abstract, $concrete);
        // });
    }


    /**
     * Register the vendor blade components.
     *
     * @return void
     */
    protected function vendorBladeComponents()
    {
        Blade::componentNamespace('VedianSoft\\Cms\\View', 'vedian');
    }

    /**
     * Load the vendor loaders.
     *
     * @return void
     */
    protected function vendorLoaders()
    {
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        // Load views
        $this->loadViewsFrom(__DIR__ . '/../views', 'vedian');
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/auth.php');
    }

    /**
     * Get the vendor publishers for the service provider.
     *
     * @return array
     */
    protected function vendorPublishers()
    {
        // Publish migrations
        $this->publishes([
            __DIR__ .
                '/../database/migrations' => database_path('migrations/pagebuilder')
        ], 'pagebuilder-migrations');

        // Publish config file
        $this->publishes([
            __DIR__ . '/../config/app.php' => config_path('pagebuilder.php'),
        ], 'pagebuilder-config');

        // Publish views
        $this->publishes([
            __DIR__ . '/../views' => resource_path('views/vendor/pagebuilder'),
        ], 'pagebuilder-views');
    }
}

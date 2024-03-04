<?php

namespace Cms;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Reflection;
use ReflectionClass;
use Vedian\Cms\Contracts\ReflectionServiceContract;
use Vedian\Cms\Contracts\StylingServiceContract;
use Vedian\Cms\Contracts\View\HtmlContainer;
use Vedian\Cms\Contracts\View\HtmlElement;
use Vedian\Cms\Services\ReflectionService;
use Vedian\Cms\Services\StylingService;
use Vedian\Cms\View\Html\Container;
use Vedian\Cms\View\Html\Element;

/**
 * Class CmsServiceProvider
 * 
 * The service provider for the Vedian CMS.
 *
 * @package Cms
 */
class CmsProvider extends ServiceProvider
{
    /** 
     * 
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // publish dependencies
        $this->publishes([
            __DIR__ .
                '/../database/migrations' => database_path('migrations/pagebuilder')
        ], 'pagebuilder-migrations');

        $this->publishes([
            __DIR__ . '/../config/app.php' => config_path('pagebuilder.php'),
        ], 'pagebuilder-config');

        $this->publishes([
            __DIR__ . '/../views' => resource_path('views/vendor/pagebuilder'),
        ], 'pagebuilder-views');

        // Load dependencies
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../views', 'vedian');
        // $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/auth.php');

        // Blade::componentNamespace('Cms\\View\\Html', 'element');
    }
}

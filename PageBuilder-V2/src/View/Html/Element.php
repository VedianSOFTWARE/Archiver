<?php

namespace Vedian\Cms\View\Html;

use Illuminate\Support\Collection;
use Illuminate\View\Component;
use ReflectionClass;
use Illuminate\View\View as IlluminateView;
use Vedian\Cms\Contracts\ReflectionServiceContract;
use Vedian\Cms\Contracts\StylingServiceContract;
use Vedian\Cms\Contracts\View\HtmlElement;
use Vedian\Cms\Services\ReflectionService;

/**
 * Class Component
 * 
 * Represents a view component in the Vedian CMS.
 *
 * @package Vedian\Cms\View
 */
abstract class Element extends Component implements HtmlElement
{

    /**
     * The HTML content of the component.
     *
     * @var string
     */
    public $html;

    /**
     * The CSS class of the component.
     *
     * @var string
     */
    public $class;

    /**
     * The component attributes.
     *
     * @var \Illuminate\View\ComponentAttributeBag
     */
    public $attributes;

    /**
     * The name of the view.
     *
     * @var string
     */
    protected string $view = 'view';

    /**
     * The directory where the view is located.
     *
     * @var string
     */
    protected string $directory = 'html';

    /**
     * The namespace of the view.
     *
     * @var string
     */
    protected string $namespace = 'vedian';

    /**
     * The HTML attributes of the component.
     *
     * @var \Illuminate\Support\Collection
     */
    protected Collection $htmlAttributes;

    /**
     * The CSS class attributes of the component.
     *
     * @var \Illuminate\Support\Collection
     */
    protected Collection $classAttribute;

    /**
     * The styling service contract.
     *
     * @var StylingServiceContract
     */
    protected StylingServiceContract $stylingService;



    /**
     * The HTML classes of the component.
     *
     * @var array
     */
    public $htmlClasses;

    /**
     * Component constructor.
     *
     * @param ReflectionService $reflection The reflection service contract.
     * @param Collection $serviceContracts The collection of service contracts.
     */
    public function __construct(
        // protected ReflectionClass|ReflectionService|ReflectionServiceContract $reflection,
        protected Collection $serviceContracts,
        protected ReflectionServiceContract $reflection
    ) {
        // Initialize the component.
        $this->initializeComponent();

        // Initialize the HTML and class attributes.
        $this->addHtmlAttribute('class', $this->htmlClasses);

        $this->withAttributes($this->getHtmlAttributes());
    }
    
    /**
     * Initialize the HTML and class attributes.
     *
     * @return void
     */
    protected function initializeComponent(): void
    {
        $this->htmlAttributes = collect();
        $this->classAttribute = collect();

        $this->htmlClasses = collect($this->htmlClasses);
        $this->view = $this->reflection->getReflectionName() ?? $this->view;

        $this->reflection
            ->mapContracts($this->serviceContracts)
            ->each(function ($service, $property) {
                $this->$property = $service;
            });
    }

    /**
     * Set the extra attributes that the slot should make available.
     *
     * @param array $attributes The attributes to be set.
     * @return $this
     */
    public function withAttributes(array $attributes)
    {
        $this->attributes = $this->newAttributeBag($attributes);

        return $this;
    }

    /**
     * Add an HTML attribute to the component.
     *
     * @param string $key The attribute key.
     * @param mixed $values The attribute values.
     * @return void
     */
    protected function addHtmlAttribute($key, $values): void
    {
        $this->htmlAttributes->put($key, $values->implode(' '));
    }

    /**
     * Get the HTML attributes of the component.
     *
     * @param string $attr The attribute name.
     * @return array|string
     */
    public function getHtmlAttributes(string $attr = '')
    {
        return !empty($attr) ? $this->htmlAttributes->get($attr) : $this->htmlAttributes->toArray();
    }

    /**
     * Set the view name.
     *
     * @return void
     */
    protected function setView(): void
    {
        $this->view = $this->reflection->getReflectionName();
    }

    /**
     * Get the view viewPath.
     *
     * @return string
     */
    public function viewPath(): string
    {
        return $this->namespace . '::' . $this->directory . '.' . $this->view;
    }

    /**
     * Render the view.
     *
     * @return IlluminateView
     */
    public function render(): IlluminateView
    {
        return view($this->viewPath());
    }
}

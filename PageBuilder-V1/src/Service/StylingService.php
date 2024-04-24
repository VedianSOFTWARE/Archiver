<?php

namespace Vedian\Cms\Services;

use ReflectionClass;
use Illuminate\Support\Collection; // Add missing import
use ReflectionMethod;
use ReflectionParameter;
use Vedian\Cms\Contracts\StylingServiceContract;

/**
 * This class represents a base styling service that can be extended by other styling services.
 * It implements the StylingServiceContract interface.
 */
abstract class StylingService implements StylingServiceContract
{
    /**
     * The array of classes associated with the styling service.
     *
     * @var array
     */
    public array $classes = [];

    // /**
    //  * The reflection class instance.
    //  *
    //  * @var ReflectionClass
    //  */
    // protected ReflectionClass $reflection;

    // /**
    //  * The reflection method instance.
    //  *
    //  * @var ReflectionMethod
    //  */
    // protected ReflectionMethod $constructor;

    // /**
    //  * The collection of parameters.
    //  *
    //  * @var Collection
    //  */
    // protected Collection $parameters;

    /**
     * Constructs a new StylingService instance.
     *
     * @param Collection $attributes The collection of attributes.
     */
    public function __construct(
        protected Collection $attributes,
    ) {
        $this->putAttributes('class', $this->getClassAttribute());
    }

    /**
     * Get the classes associated with the styling service.
     *
     * @return array The array of classes.
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * Get the class attribute by concatenating the classes.
     *
     * @return string The concatenated class attribute.
     */
    public function getClassAttribute()
    {
        return implode(' ', $this->getClasses());
    }

    /**
     * Put an attribute into the attributes collection.
     *
     * @param string $key The key of the attribute.
     * @param mixed $value The value of the attribute.
     * @return void
     */
    protected function putAttributes(string $key, $value)
    {
        $this->attributes->put($key, $value);
    }

    /**
     * Get the attributes associated with the styling service.
     *
     * @return Collection The collection of attributes.
     */
    public function getAttributes()
    {
        return $this->attributes->toArray();
    }
}

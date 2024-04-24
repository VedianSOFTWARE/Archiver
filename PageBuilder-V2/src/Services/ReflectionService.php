<?php

namespace Vedian\Cms\Services;

use Illuminate\Support\Collection;
use ReflectionClass;
use Vedian\Cms\Contracts\ReflectionServiceContract;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class ReflectionService implements ReflectionServiceContract
{
    /**
     * The name of the reflection class.
     *
     * @var Stringable
     */
    private Stringable $name;

    /**
     * Create a new ReflectionService instance.
     *
     * @param ReflectionClass $reflection
     */
    public function __construct(
        protected ReflectionClass $reflection
    ) {
        $this->setReflectionName();
    }

    /**
     * Map contracts and replace reflection name with new instance.
     *
     * @param mixed $service
     * @return mixed
     */
    public function mapContracts(Collection &$service)
    {
        return $service->mapWithKeys(function ($service) {
            return [$this->serviceName($service) => new $service];
        });
    }

    /**
     * Replace reflection name from the given service.
     *
     * @param string $service
     * @return string
     */
    private function serviceName($service): string
    {
        return $this->stringableName($service)
            ->lcfirst();
    }

    /**
     * Get the reflection name.
     *
     * @return Stringable
     */
    public function getReflectionName(): Stringable
    {
        return $this->name;
    }

    /**
     * Set the reflection name.
     *
     * @return void
     */
    protected function setReflectionName(): void
    {
        $this->name = $this->stringableName($this->reflection)
            ->lcfirst();
    }

    /**
     * Get the reflection class.
     *
     * @return ReflectionClass
     */
    public function getReflection(): ReflectionClass
    {
        return $this->reflection;
    }

    /**
     * Get the reflection class name as a stringable object.
     *
     * @return Stringable
     */
    protected function stringableName(ReflectionClass|string $reflection): Stringable
    {
        if (is_string($reflection)) {
            $reflection = new ReflectionClass($reflection);
        }
        return Str::of($reflection->getShortName());
    }
}

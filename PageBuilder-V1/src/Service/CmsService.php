<?php

namespace Vedian\Cms\Services;

use Vedian\Cms\Contracts\ModelContract;

/**
 * Class Service
 * 
 * This class represents a Service for creating CMS pages.
 */
abstract class CmsService
{
    /**
     * Constructor method for the Service.
     *
     * @param ServiceContract $model The model instance.
     * @return void
     */
    public function __construct(
        protected ModelContract $model
    ) {
        $this->setModel($model);
    }

    /**
     * Get the model instance.
     *
     * @return ServiceContract The model instance.
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the model instance.
     *
     * @param ServiceContract $model The model instance.
     * @return void
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    abstract function save();
}

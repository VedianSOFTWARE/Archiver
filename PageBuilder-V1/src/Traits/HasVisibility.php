<?php

namespace Vedian\Cms\Traits;

use Vedian\Cms\Enumerations\Visibility;

/**
 * Trait HasVisibility
 *
 * This trait provides methods for handling visibility of a model.
 */
trait HasVisibility
{
    /**
     * Initialize the HasVisibility trait.
     *
     * This method merges the 'visibility' attribute into the fillable array
     * and sets the 'visibility' attribute to be casted as an instance of the Visibility class.
     *
     * @return void
     */
    public function initializeHasVisibility()
    {
        $this->mergeFillable(['visibility']);
        $this->mergeCasts(['visibility' => Visibility::class]);
    }
}

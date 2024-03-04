<?php

namespace Vedian\Cms\Traits;

use Vedian\Cms\Enumerations\Status;

/**
 * Trait HasStatus
 * 
 * This trait provides functionality for managing the status of a model.
 */
trait HasStatus
{
    /**
     * Initialize the HasStatus trait.
     * 
     * This method merges the 'status' attribute into the fillable array and casts it to the Status enumeration class.
     *
     * @return void
     */
    public function initializeHasStatus()
    {
        $this->mergeFillable(['status']);
        $this->mergeCasts(['status' => Status::class]);
    }
}

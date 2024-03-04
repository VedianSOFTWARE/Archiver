<?php

namespace Vedian\Cms\Traits;

/**
 * Trait IsVisibleBetween
 *
 * This trait provides methods for handling visibility between specific dates.
 */
trait IsVisibleBetween
{
    /**
     * Initialize the IsVisibleBetween trait.
     *
     * This method merges the fillable attributes and casts for the visibility dates.
     *
     * @return void
     */
    public function initializeIsVisibleBetween()
    {
        $this->mergeFillable(['visible_from', 'visible_till']);
        $this->mergeCasts(['visible_from' => 'datetime', 'visible_till' => 'datetime']);
    }
}

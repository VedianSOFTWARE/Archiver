<?php

namespace Vedian\Cms\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasAuthor
{
    /**
     * Boot the HasAuthor trait.
     *
     * This method is called when the trait is being booted.
     * It registers event listeners for the "creating" and "created" events.
     * The "creating" event sets the "created_by" attribute to the authenticated user's ID.
     * The "created" event sets the "published_at" attribute to the current datetime and saves the model.
     *
     * @return void
     */
    protected static function bootHasAuthor()
    {

        /**
         * This trait provides functionality for automatically setting the author and publication date
         * when creating a model instance.
         */
        static::creating(function (Model $model) {
            $model->created_by = auth()->id();
        });

        /**
         * This event is triggered after a model instance is created. It sets the publication date
         * to the current time and saves the model.
         */
        static::created(function (Model $model) {
            $model->published_at = now();
            $model->save();
        });
    }
}

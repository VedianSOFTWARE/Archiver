<?php 

namespace Vedian\Cms\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Vedian\Cms\Traits\HasAuthor;
use Vedian\Cms\Traits\HasStatus;
use Vedian\Cms\Traits\HasVisibility;
use Vedian\Cms\Traits\IsVisibleBetween;

/**
 * Class Page
 *
 * This class represents a page in the VedianSOFT CMS.
 * It extends the Eloquent Model class and implements the PageContract interface.
 * It also uses several traits for additional functionality.
 *
 * @package Vedian\Cms\Models
 */
class Page extends ServiceModel
{
    use HasAuthor, HasVisibility, HasStatus, IsVisibleBetween, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'excerpt'
    ];

    // Define any relationships or additional methods here

    /**
     * Get the rows associated with the page.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rows()
    {
        return $this->belongsToMany(Row::class, 'page_rows');
    }
}

<?php

namespace Vedian\Cms\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;
use Vedian\Cms\Enumerations\ContentType;
use Vedian\Cms\Enumerations\Status;
use Vedian\Cms\Enumerations\Visibility;

/**
 * Class PageService
 * 
 * This class represents a Service for creating and modifying page models in the VedianSOFT CMS.
 * It extends the Builder class and implements the ServiceContract interface.
 */
class PageService extends CmsService
{
    protected Collection $rows;

    // 
    protected string $title;
    protected string $slug;
    protected string $excerpt;

    protected ContentType $contentType;
    protected Visibility $visibility;
    protected Status $status;

    protected Date $visible_from;
    protected Date $visible_to;
    
    public function save()
    {
        
    }
}

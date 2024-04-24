<?php

namespace Vedian\Cms\Services;

use Illuminate\Support\Collection;
use Vedian\Cms\Contracts\ContainerStylingServiceContract;

/**
 * Class PageService
 * 
 * This class represents a Service for creating and modifying page models in the VedianSOFT CMS.
 * It extends the Builder class and implements the ServiceContract interface.
 */
class ContainerStylingService extends StylingService implements ContainerStylingServiceContract
{
    public array $classes = [
        'p' => 'p-2',
        'm' => 'm-2',
        'bg' => 'bg-indigo-500',
        'border' => 'border border-1 border-gray-200',
        'rounded' => 'rounded',
        'shadow' => 'shadow',
    ];
}

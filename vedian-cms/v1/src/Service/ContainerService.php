<?php

namespace Vedian\Cms\Services;

use Vedian\Cms\Contracts\ServiceContract;

/**
 * Class PageService
 * 
 * This class represents a Service for creating and modifying page models in the VedianSOFT CMS.
 * It extends the Builder class and implements the ServiceContract interface.
 */
class ContainerService extends StylingService implements ServiceContract
{
    public function __construct(
        public ServiceContract $stylingService,
        public string $maxWidth = 'max-w-7xl',
        public string $margin = 'mx-auto',
        public string $padding = 'py-6 px-4',
        public string $sm = 'sm:px-6',
        public string $lg = 'lg:px-8'
    ) {
        $this->init();
    }
}

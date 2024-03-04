<?php 

namespace Vedian\Cms\Enumerations;

use Vedian\Cms\Traits\EnumToArray;

enum Status: string {
    
    use EnumToArray;

    case DRAFT='draft';
    case PUBLISHED='published';
    case DELETED='deleted';
    case HIDDEN='hidden';
    case ARCHIVE='archive';

    public function is(): string
    {
        return match($this) {
            Status::DRAFT => 'draft',
            Status::PUBLISHED => 'published',
            Status::DELETED => 'deleted',
            Status::HIDDEN => 'hidden',
            Status::ARCHIVE => 'archive',
        };
    }

    public static function getValues(): array
    {
        return [
            Status::DRAFT->value,
            Status::PUBLISHED->value,
            Status::DELETED->value,
            Status::HIDDEN->value,
            Status::ARCHIVE->value,
        ];
    }
}

    

<?php 

namespace Vedian\Cms\Enumerations;

use Vedian\Cms\Traits\EnumToArray;

enum ContentType: string {
    
    use EnumToArray;

    case PAGE='page';
    case BLOG='blog';

    public function is(): string
    {
        return match($this) {
            ContentType::PAGE => 'page',
            ContentType::BLOG => 'blog',
        };
    }

    public static function getValues(): array
    {
        return [
            ContentType::PAGE->value,
            ContentType::BLOG->value,
        ];
    }
}

    

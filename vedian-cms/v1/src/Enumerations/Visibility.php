<?php

namespace Vedian\Cms\Enumerations;

use Vedian\Cms\Traits\EnumToArray;

enum Visibility: string
{
    use EnumToArray;

    case PUBLIC = 'public';
    case PRIVATE = 'private';

    public function is(): string
    {
        return match ($this) {
            Visibility::PUBLIC => 'public',
            Visibility::PRIVATE => 'private',
        };
    }

    public static function getValues(): array
    {
        return [
            Visibility::PUBLIC->value,
            Visibility::PRIVATE->value,
        ];
    }
}

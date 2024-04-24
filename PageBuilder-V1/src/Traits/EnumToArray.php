<?php


namespace Vedian\Cms\Traits;

/**
 * Trait EnumToArray
 * 
 * This trait provides methods to convert an enum class to an array representation.
 */
trait EnumToArray
{
    /**
     * Get the string value of the enum based on the given value.
     *
     * @param mixed $value The value of the enum.
     * @return string The string value of the enum.
     */
    public static function value($value): string
    {
        return static::tryFrom($value)->value;
    }

    /**
     * Get an array of the names of the enum cases.
     *
     * @return array An array of the names of the enum cases.
     */
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    /**
     * Get an array of the values of the enum cases.
     *
     * @return array An array of the values of the enum cases.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Get an array representation of the enum.
     *
     * @return array An array representation of the enum, where the values are the keys and the names are the values.
     */
    public static function array(): array
    {
        return array_combine(self::values(), self::names());
    }
}

<?php

declare(strict_types=1);

namespace App\Enums\Traits;

trait HasValues
{
    public static function assocValues(): array
    {
        return array_column(self::cases(), 'value', 'name');
    }

    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function fromName(string $name): self
    {
        return self::from(self::assocValues()[$name]);
    }

    public static function tryFromName(string $name): ?self
    {
        $value = self::assocValues()[$name] ?? false;

        return $value ? self::from($value) : null;
    }
}

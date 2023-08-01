<?php

namespace App\Enum;

enum MeasurementUnit: string
{
    case GRAM = 'g';
    case KILOGRAM = 'kg';

    public function getMultiplier(): int
    {
        return match ($this) {
            self::GRAM => 1,
            self::KILOGRAM => 1000,
        };
    }
}

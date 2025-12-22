<?php

declare(strict_types=1);

namespace Fabyo0\WeightConversion;

use AllowDynamicProperties;

#[AllowDynamicProperties]
class WeightConversion
{
    private const UNITS = [
        'kg' => 1000,
        'g' => 1,
        'mg' => 0.001,
        'lb' => 453.592,
        'oz' => 28.3495,
        't' => 1_000_000,
    ];

    private float $valueGrams;

    public function __construct(
        private readonly float $value,
        private readonly string $unit = 'kg'
    ) {
        $this->validateUnit($unit);
        $this->valueInGrams = $this->value * self::UNITS[$this->unit];
    }

    private function validateUnit(string $unit): void
    {
        if (! array_key_exists($unit, self::UNITS)) {
            throw new \InvalidArgumentException("Unsupported unit: {$unit}");
        }
    }

    public function toGrams(): float
    {
        return $this->valueInGrams;
    }

    public function toKilograms(): float
    {
        return $this->valueInGrams / self::UNITS['kg'];
    }

    public function toMilligrams(): float
    {
        return $this->valueInGrams / self::UNITS['mg'];
    }

    public function toPounds(): float
    {
        return $this->valueInGrams / self::UNITS['lb'];
    }

    public function toOunces(): float
    {
        return $this->valueInGrams / self::UNITS['oz'];
    }

    public function toTons(): float
    {
        return $this->valueInGrams / self::UNITS['t'];
    }
}

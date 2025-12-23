<?php

declare(strict_types=1);

namespace Fabyo0\WeightConversion;

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

    private float $valueInGrams;

    public function __construct(
        private readonly float $value,
        private readonly string $unit = 'kg'
    ) {
        $this->validateUnit($unit);
        $this->valueInGrams = $this->value * self::UNITS[$this->unit];
    }

    public static function fromKilograms(float $value): self
    {
        return new self($value, 'kg');
    }

    public static function fromGrams(float $value): self
    {
        return new self($value, 'g');
    }

    public static function fromPounds(float $value): self
    {
        return new self($value, 'lb');
    }

    public static function fromOunces(float $value): self
    {
        return new self($value, 'oz');
    }

    public static function fromMilligrams(float $value): self
    {
        return new self($value, 'mg');
    }

    public static function fromTons(float $value): self
    {
        return new self($value, 't');
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

    public function getValue(): float
    {
        return $this->value;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function format(int $decimals = 2): string
    {
        return number_format($this->value, $decimals).' '.$this->unit;
    }

    public function add(float $value, string $unit = 'kg'): self
    {
        $other = new self($value, $unit);
        $totalGrams = $this->valueInGrams + $other->toGrams();

        return new self($totalGrams, 'g');
    }

    public function subtract(float $value, string $unit = 'kg'): self
    {
        $other = new self($value, $unit);
        $totalGrams = $this->valueInGrams - $other->toGrams();

        return new self($totalGrams, 'g');
    }

    public function multiply(float $factor): self
    {
        return new self($this->valueInGrams * $factor, 'g');
    }

    public function divide(float $divisor): self
    {
        if ($divisor === 0.0) {
            throw new \InvalidArgumentException('Cannot divide by zero');
        }

        return new self($this->valueInGrams / $divisor, 'g');
    }

    public function isGreaterThan(self $other): bool
    {
        return $this->valueInGrams > $other->toGrams();
    }

    public function isLessThan(self $other): bool
    {
        return $this->valueInGrams < $other->toGrams();
    }

    public function isEqualTo(self $other): bool
    {
        return $this->valueInGrams === $other->toGrams();
    }

    private function validateUnit(string $unit): void
    {
        if (! array_key_exists($unit, self::UNITS)) {
            $supported = implode(', ', array_keys(self::UNITS));
            throw new \InvalidArgumentException(
                "Unsupported unit: {$unit}. Supported units: {$supported}"
            );
        }
    }

    public static function getSupportedUnits(): array
    {
        return array_keys(self::UNITS);
    }
}

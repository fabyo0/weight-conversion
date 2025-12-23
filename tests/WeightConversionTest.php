<?php

declare(strict_types=1);

use Fabyo0\WeightConversion\WeightConversion;

test('converts kilograms to grams', function () {
    $weight = new WeightConversion(1, 'kg');

    expect($weight->toGrams())
        ->toBeFloat()
        ->toBe(1000.0);
});

test('converts kilograms to pounds', function () {
    $weight = new WeightConversion(1, 'kg');

    expect($weight->toPounds())
        ->toBeFloat()
        ->toEqualWithDelta(2.205, 0.001);
});

test('converts pounds to kilograms', function () {
    $weight = new WeightConversion(1, 'lb');

    expect($weight->toKilograms())
        ->toBeFloat()
        ->toEqualWithDelta(0.453, 0.001);
});

test('converts grams to milligrams', function () {
    $weight = new WeightConversion(1, 'g');

    expect($weight->toMilligrams())
        ->toBeFloat()
        ->toBe(1000.0);
});

test('converts kilograms to tons', function () {
    $weight = new WeightConversion(1000, 'kg');

    expect($weight->toTons())
        ->toBeFloat()
        ->toBe(1.0);
});

test('converts kilograms to ounces', function () {
    $weight = new WeightConversion(1, 'kg');

    expect($weight->toOunces())
        ->toBeFloat()
        ->toEqualWithDelta(35.274, 0.001);
});

test('creates instance from kilograms using static method', function () {
    $weight = WeightConversion::fromKilograms(100);

    expect($weight->toGrams())->toBe(100000.0);
});

test('creates instance from pounds using static method', function () {
    $weight = WeightConversion::fromPounds(1);

    expect($weight->toGrams())
        ->toEqualWithDelta(453.592, 0.001);
});

test('creates instance from grams using static method', function () {
    $weight = WeightConversion::fromGrams(1000);

    expect($weight->toKilograms())->toBe(1.0);
});

test('creates instance from ounces using static method', function () {
    $weight = WeightConversion::fromOunces(16);

    expect($weight->toPounds())
        ->toEqualWithDelta(1.0, 0.001);
});

test('creates instance from milligrams using static method', function () {
    $weight = WeightConversion::fromMilligrams(1000);

    expect($weight->toGrams())
        ->toBe(1.0);
});

test('creates instance from tons using static method', function () {
    $weight = WeightConversion::fromTons(1);

    expect($weight->toKilograms())->toBe(1000.0);
});

test('adds weight correctly', function () {
    $weight = WeightConversion::fromKilograms(50)
        ->add(25, 'kg');

    expect($weight->toKilograms())->toBe(75.0);
});

test('subtracts weight correctly', function () {
    $weight = WeightConversion::fromKilograms(100)
        ->subtract(30, 'kg');

    expect($weight->toKilograms())->toBe(70.0);
});

test('multiplies weight correctly', function () {
    $weight = WeightConversion::fromKilograms(10)
        ->multiply(3);

    expect($weight->toKilograms())->toBe(30.0);
});

test('divides weight correctly', function () {
    $weight = WeightConversion::fromKilograms(100)
        ->divide(4);

    expect($weight->toKilograms())->toBe(25.0);
});

test('throws exception when dividing by zero', function () {
    WeightConversion::fromKilograms(100)->divide(0);
})->throws(InvalidArgumentException::class, 'Cannot divide by zero');

test('chains multiple arithmetic operations', function () {
    $weight = WeightConversion::fromKilograms(50)
        ->add(25)
        ->subtract(10)
        ->multiply(2);

    expect($weight->toKilograms())->toBe(130.0);
});

test('compares weights with isGreaterThan', function () {
    $weight1 = WeightConversion::fromKilograms(100);
    $weight2 = WeightConversion::fromKilograms(50);

    expect($weight1->isGreaterThan($weight2))->toBeTrue()
        ->and($weight2->isGreaterThan($weight1))->toBeFalse();
});

test('compares weights with isLessThan', function () {
    $weight1 = WeightConversion::fromKilograms(50);
    $weight2 = WeightConversion::fromKilograms(100);

    expect($weight1->isLessThan($weight2))->toBeTrue()
        ->and($weight2->isLessThan($weight1))->toBeFalse();
});

test('compares weights with isEqualTo', function () {
    $weight1 = WeightConversion::fromKilograms(1);
    $weight2 = WeightConversion::fromGrams(1000);

    expect($weight1->isEqualTo($weight2))->toBeTrue();
});

test('compares different units correctly', function () {
    $weight1 = WeightConversion::fromPounds(2.205);
    $weight2 = WeightConversion::fromKilograms(1);

    expect($weight1->isGreaterThan($weight2))->toBeTrue();
});


test('returns original value with getValue', function () {
    $weight = new WeightConversion(75.5, 'kg');

    expect($weight->getValue())->toBe(75.5);
});

test('returns original unit with getUnit', function () {
    $weight = new WeightConversion(75.5, 'kg');

    expect($weight->getUnit())->toBe('kg');
});

test('formats weight correctly', function () {
    $weight = new WeightConversion(75.5, 'kg');

    expect($weight->format(2))->toBe('75.50 kg');
});

test('formats weight with different decimals', function () {
    $weight = new WeightConversion(75.555, 'kg');

    expect($weight->format(0))->toBe('76 kg')
        ->and($weight->format(1))->toBe('75.6 kg')
        ->and($weight->format(3))->toBe('75.555 kg');
});

test('returns supported units', function () {
    $units = WeightConversion::getSupportedUnits();

    expect($units)
        ->toBeArray()
        ->toContain('kg', 'g', 'mg', 'lb', 'oz', 't');
});

test('throws exception for unsupported unit', function () {
    new WeightConversion(1, 'invalid');
})->throws(InvalidArgumentException::class);

test('accepts all supported units', function () {
    $units = ['kg', 'g', 'mg', 'lb', 'oz', 't'];

    foreach ($units as $unit) {
        $weight = new WeightConversion(1, $unit);
        expect($weight->getUnit())->toBe($unit);
    }
});

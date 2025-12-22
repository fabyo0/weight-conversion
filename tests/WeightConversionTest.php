<?php

declare(strict_types =1);

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

test('throws exception for unsupported unit', function () {
    new WeightConversion(1, 'invalid');
})->throws(InvalidArgumentException::class, 'Unsupported unit: invalid');

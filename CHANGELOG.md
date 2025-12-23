# Changelog

All notable changes to `weight-conversion` will be documented in this file.

## v1.1.0 - 2025-12-22

### Added

- Static factory methods (`fromKilograms()`, `fromGrams()`, `fromPounds()`, `fromOunces()`, `fromMilligrams()`, `fromTons()`)
- Arithmetic methods (`add()`, `subtract()`, `multiply()`, `divide()`)
- Comparison methods (`isGreaterThan()`, `isLessThan()`, `isEqualTo()`)
- Utility methods (`format()`, `getValue()`, `getUnit()`, `getSupportedUnits()`)
- Comprehensive test coverage for all new methods
- Method chaining support

### Usage
```php
use Fabyo0\WeightConversion\WeightConversion;

// Static factory methods
$weight = WeightConversion::fromKilograms(100);
$weight = WeightConversion::fromPounds(220);

// Method chaining
$total = WeightConversion::fromKilograms(50)
    ->add(25, 'kg')
    ->subtract(10, 'lb')
    ->toKilograms();

// Comparison methods
$weight1 = WeightConversion::fromKilograms(100);
$weight2 = WeightConversion::fromPounds(220);

$weight1->isGreaterThan($weight2); // true/false

// Formatting output
$weight = new WeightConversion(75.5, 'kg');
echo $weight->format(2); // "75.50 kg"

// Get supported units
WeightConversion::getSupportedUnits(); // ['kg', 'g', 'mg', 'lb', 'oz', 't']
```

---

## v1.0.0 - 2025-12-22

### First Stable Release

A simple and flexible weight conversion package for PHP.

### Features

- Convert between multiple weight units (kg, g, mg, lb, oz, t)
- Simple and intuitive API
- Full type safety with PHP 8.2+
- Comprehensive unit tests

### Supported Units

| Unit | Symbol |
|------|--------|
| Kilogram | kg |
| Gram | g |
| Milligram | mg |
| Pound | lb |
| Ounce | oz |
| Metric Ton | t |

### Usage
```php
use Fabyo0\WeightConversion\WeightConversion;

$weight = new WeightConversion(1, 'kg');

$weight->toGrams();      // 1000.0
$weight->toPounds();     // 2.205
$weight->toOunces();     // 35.274
```

### Installation
```bash
composer require fabyo0/weight-conversion
```

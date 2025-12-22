# Changelog

All notable changes to `:weight-conversion` will be documented in this file.

## v1.0.0 - First Stable Release - 2025-12-22

### First Stable Release

A simple and flexible weight conversion package for PHP.

#### Features

- Convert between multiple weight units (kg, g, mg, lb, oz, t)
- Simple and intuitive API
- Full type safety with PHP 8.2+
- Comprehensive unit tests

#### Supported Units

| Unit | Symbol |
|------|--------|
| Kilogram | kg |
| Gram | g |
| Milligram | mg |
| Pound | lb |
| Ounce | oz |
| Metric Ton | t |

#### Usage

```php
use Fabyo0\WeightConversion\WeightConversion;

$weight = new WeightConversion(1, 'kg');

$weight->toGrams();      // 1000.0
$weight->toPounds();     // 2.205
$weight->toOunces();     // 35.274

```
#### Installation

```bash
composer require fabyo0/weight-conversion

```
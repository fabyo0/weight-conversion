# Weight Conversion

[![Latest Version on Packagist](https://img.shields.io/packagist/v/fabyo0/weight-conversion.svg?style=flat-square)](https://packagist.org/packages/fabyo0/weight-conversion)
[![Tests](https://img.shields.io/github/actions/workflow/status/fabyo0/weight-conversion/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/fabyo0/weight-conversion/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/fabyo0/weight-conversion.svg?style=flat-square)](https://packagist.org/packages/fabyo0/weight-conversion)

A simple and flexible weight conversion package for PHP. Convert between kilograms, grams, pounds, ounces and more with ease.

> **Note:** This package was developed as a learning project, following the [Spatie Laravel Package Training](https://laravelpackage.training) course as a reference.

## Installation

You can install the package via composer:
```bash
composer require fabyo0/weight-conversion
```

## Usage
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

## Supported Units

| Unit | Symbol |
|------|--------|
| Kilogram | kg |
| Gram | g |
| Milligram | mg |
| Pound | lb |
| Ounce | oz |
| Ton (Metric) | t |

## Testing
```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## Security Vulnerabilities

If you discover a security vulnerability, please send an email to emredikmen002@gmail.com.

## Credits

- [Emre Dikmen](https://github.com/fabyo0)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

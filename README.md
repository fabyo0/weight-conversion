# Weight Conversion

[![Latest Version on Packagist](https://img.shields.io/packagist/v/fabyo0/weight-conversion.svg?style=flat-square)](https://packagist.org/packages/fabyo0/weight-conversion)
[![Tests](https://img.shields.io/github/actions/workflow/status/fabyo0/weight-conversion/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/fabyo0/weight-conversion/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/fabyo0/weight-conversion.svg?style=flat-square)](https://packagist.org/packages/fabyo0/weight-conversion)

A simple and flexible weight conversion package for PHP. Convert between kilograms, grams, pounds, ounces and more with ease.

## Installation

You can install the package via composer:
```bash
composer require fabyo0/weight-conversion
```

## Usage
```php
use Fabyo0\WeightConversion\WeightConversion;

// Create a converter with kilograms
$weight = new WeightConversion(100, 'kg');

// Convert to different units
$weight->toGrams();     // 100000
$weight->toPounds();    // 220.462
$weight->toOunces();    // 3527.396

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

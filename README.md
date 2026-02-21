# Laravel WAHA

[![Latest Version on Packagist](https://img.shields.io/packagist/v/njoguamos/laravel-waha.svg?style=flat-square)](https://packagist.org/packages/njoguamos/laravel-waha)
[![Total Downloads](https://img.shields.io/packagist/dt/njoguamos/laravel-waha.svg?style=flat-square)](https://packagist.org/packages/njoguamos/laravel-waha)

**Laravel WAHA** is an opinionated Laravel package for interacting with the [WAHA API](https://waha.example.com).

## Requirements

| Version | PHP          | Laravel    |
|---------|--------------|------------|
| 1.x     | 8.4.x, 8.5.x | 12.x, 13.x |

## Installation

You can install the package via Composer:

```bash
composer require njoguamos/laravel-waha
```

## Configuration

### Environment variables

- `WAHA_API_KEY` – Your WAHA API key
- `WAHA_BASE_URL` – Base API URL (default `https://waha.example.com`)

```dotenv
WAHA_API_KEY=your-api-key
WAHA_BASE_URL=https://waha.example.com
```

## Publishing Configuration

You can publish the configuration by running the following command:

```bash
php artisan vendor:publish --tag=config --provider="NjoguAmos\Waha\WahaServiceProvider"
```

## Usage

Here is a quick example of how to send a text status:

```php
use NjoguAmos\Waha\Facades\Status;
use NjoguAmos\Waha\Dto\TextStatusData;

$statusData = new TextStatusData(
    text: 'Have a look! https://waha.example.com/',
    backgroundColor: '#38b42f',
    font: 1
);

$result = Status::sendText(session: 'default', data: $statusData);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Njogu Amos](https://github.com/njoguamos)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

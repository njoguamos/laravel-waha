# AI Development Instructions

## Project Overview

This is **Laravel WAHA** - a PHP Laravel package that provides an elegant API client for the [WAHA (WhatsApp HTTP API)](https://waha.example.com). The package uses [Saloon PHP](https://docs.saloon.dev/) as its HTTP client foundation.

- **Package Name:** `njoguamos/laravel-waha`
- **PHP Version:** ^8.4
- **Laravel Version:** ^12.x
- **License:** MIT
- **Author:** Njogu Amos (njoguamos@gmail.com)

## Architecture

### Directory Structure

```text
├── config/           # Package configuration
├── docs/             # Documentation (VitePress)
├── src/              # Source code
│   ├── Dto/          # Data Transfer Objects
│   ├── Endpoints/    # API endpoint classes (Status, etc.)
│   ├── Facades/      # Laravel facades
│   └── Requests/     # Saloon request classes
├── tests/            # Pest PHP tests
│   ├── Feature/      # Feature tests
│   ├── Unit/         # Unit tests
│   ├── Pest.php      # Pest configuration
│   └── TestCase.php  # Base test case
```

### Core Patterns

1. **Saloon HTTP:** `WahaConnector` (auth & headers) → `Request` classes (per endpoint) → DTOs via `createDtoFromResponse()`
2. **Endpoints:** Extend `Waha` base class, return typed DTOs, accessible via facades
3. **DTOs:** Have `fromArray()` constructor and `toArray()` serialization
4. **Service Provider:** Binds `WahaConnector` to container, publishes config
5. **Facades:** Static access via `Status::sendText()` instead of `app(Status::class)->sendText()`

## Coding Standards

### PHP Style (Pint Configuration)

Run formatting with: `composer format`

Key rules from `pint.json`:

- **Preset:** PSR-12
- **Strict types:** Required (`declare(strict_types=1);`)
- **Array syntax:** Short `[]`
- **Imports:** Sorted by length
- **Class elements:** Ordered (traits, constants, properties, constructor, methods)
- **Binary operators:** Aligned (`=>`)
- **Date/Time immutability:** Encourages immutable datetime objects (`date_time_immutable`)
- **Multibyte strings:** Uses `mb_` string functions (`mb_str_functions`)
- **Modern type casting:** Modernizes type casting syntax (`modernize_types_casting`)
- **Global imports:** Imports classes, constants, and functions globally (`global_namespace_import`)
- **Access modifiers:** Converts `protected` to `private` where possible (`protected_to_private`)

### Code Style Examples

```php
<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class SendTextStatusRequest extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/{session}/status/text';
    }
}
```

### DTO Example

```php
<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class TextStatusData
{
    public function __construct(
        public string $text,
        public string $backgroundColor,
        public int $font,
        public ?array $contacts = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            text: $data['text'],
            backgroundColor: $data['backgroundColor'],
            font: $data['font'],
            contacts: $data['contacts'] ?? null,
        );
    }

    public function toArray(): array
    {
        $array = [
            'text'            => $this->text,
            'backgroundColor' => $this->backgroundColor,
            'font'            => $this->font,
        ];

        if ($this->contacts !== null) {
            $array['contacts'] = $this->contacts;
        }

        return $array;
    }
}
```

## Testing

Run tests: `composer test`

- **`tests/Feature/`** - Integration tests (endpoint methods, HTTP cycles)
- **`tests/Unit/`** - Unit tests (DTOs, support classes)

### Key Patterns

```php
// Mock HTTP requests
MockClient::global([
    SendTextStatusRequest::class => MockResponse::make(['text' => 'Hello'])
]);

// Test DTOs
$statusData = new TextStatusData(text: 'Hello', backgroundColor: '#38b42f', font: 1);
expect($statusData->text)->toBe('Hello');
```

- Configure in `tests/Pest.php` with `Config::preventStrayRequests()` - all HTTP requests must be mocked
- Use `test()` or `it()` functions with descriptive names

## Environment Variables

```bash
WAHA_API_KEY=your-api-key
WAHA_BASE_URL=https://waha.example.com
```

## Service Provider & Configuration

The `WahaServiceProvider` (in `src/WahaServiceProvider.php`):

```php
public function register(): void
{
    $this->app->bind(WahaConnector::class, function (): WahaConnector {
        return new WahaConnector(
            baseUrl: config()->string(key: 'waha.base_url'),
            apiKey: config()->string(key: 'waha.api_key'),
        );
    });
}

public function boot(): void
{
    $this->mergeConfigFrom(__DIR__ . '/../config/waha.php', 'waha');
    $this->publishes([__DIR__ . '/../config/waha.php' => config_path('waha.php')], 'config');
}
```

Publish config: `php artisan vendor:publish --tag=config --provider="NjoguAmos\Waha\WahaServiceProvider"`

## Using Facades

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

Each facade implements `getFacadeAccessor()` pointing to its endpoint class.

## Available Commands

| Command           | Description                    |
|-------------------|--------------------------------|
| `composer test`   | Run Pest tests                 |
| `composer format` | Run Laravel Pint (format code) |
| `composer lint`   | Check code style with Pint     |

## Adding New Features

### Adding a New API Endpoint

1. **Create the Request class** in `src/Requests/`:

```php
<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetSomething extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/something';
    }

    public function createDtoFromResponse(Response $response): SomethingData
    {
        return SomethingData::fromArray($response->json());
    }
}
```

2. **Create the DTO** in `src/Dto/`:

```php
<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

class SomethingData
{
    public function __construct(public int $id, public string $name) {}

    public static function fromArray(array $data): self
    {
        return new self(id: $data['id'], name: $data['name']);
    }
}
```

3. **Add to Endpoint** in `src/Endpoints/`, write tests in `tests/Feature/`:

## Important Notes

1. **Always use `declare(strict_types=1);`** at the top of every PHP file
2. **Type hint everything** - properties, parameters, return types
3. **Use constructor property promotion** where appropriate
4. **Prefer named arguments** for DTO constructors
5. **Handle null values** with null coalescing operator `??` in DTOs
6. **Use `dtoOrFail()`** when expecting DTOs from responses
7. **Mock all HTTP requests** in tests - stray requests are prevented
8. **Follow PSR-12** and run `composer format` before committing

# Use Semantic Commit Messages

- `feat`: (new feature for the user, not a new feature for a build script)
- `fix`: (bug fix for the user, not a fix to a build script)
- `docs`: (changes to the documentation)
- `style`: (formatting, missing semicolons, etc.; no production code change)
- `refactor`: (refactoring production code, e.g. renaming a variable)
- `test`: (adding missing tests, refactoring tests; no production code change)
- `chore`: (updating grunt tasks etc.; no production code change)

## Documentation

Full documentation is in `docs/` and can be built with VitePress.

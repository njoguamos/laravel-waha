# Getting Started

**Laravel WAHA** is an opinionated Laravel package for interacting with the [WAHA API](https://waha.devlike.pro).

## Requirements

| Version | PHP    | Composer | Laravel |
|---------|--------|----------|---------|
| 1.x     | >= 8.4 | Required | >= 12.x |

> [!IMPORTANT]
> This package supports Laravel package auto-discovery - no need to register the service provider.

## Installation

You can install the package via Composer:

```bash
composer require njoguamos/laravel-waha
```

## Environment variables

- `WAHA_API_KEY` – Your WAHA API key
- `WAHA_BASE_URL` – Base API URL (default `https://waha.example.com`)
- `WAHA_SESSION` – Default WhatsApp session name (default `default`)
- `WAHA_ENGINE` – Engine type: `WEBJS`, `GOWS`, or `NOWEB` (default `GOWS`)
- `WAHA_CHECK_NUMBER_EXISTS` – Check if number exists on WhatsApp before sending (default `true`)
- `WAHA_SEND_TYPING_STATUS` – Send typing status before message to reduce ban risk (default `true`)

```dotenv
WAHA_API_KEY=your-api-key
WAHA_BASE_URL=https://waha.example.com
WAHA_SESSION=default
WAHA_ENGINE=GOWS
WAHA_SEND_TYPING_STATUS=true
```

## Configuration

You can publish the `waha.php` configuration by running the following command:

```bash
php artisan vendor:publish --tag=config --provider="NjoguAmos\Waha\WahaServiceProvider"
```

<details>
  <summary><strong>Content of the waha.php</strong></summary>

  ```php
  return [
      'base_url' => env('WAHA_BASE_URL'),

      'api_key' => env('WAHA_API_KEY'),

      'session' => env('WAHA_SESSION', 'default'),

      'engine' => env('WAHA_ENGINE', 'GOWS'),

      'send_typing_status' => env('WAHA_SEND_TYPING_STATUS', true),
  ];
  ```
</details>

## Engines

WAHA supports different engines with varying features:

| Engine  | Description                                                          |
|---------|----------------------------------------------------------------------|
| WEBJS   | Connects via WhatsApp Web using Puppeteer to avoid detection         |
| GOWS    | Connects directly via WebSocket without requiring a browser          |
| NOWEB   | Connects directly via WebSocket, saving CPU and memory               |

See [WAHA Engines](https://waha.devlike.pro/docs/how-to/engines/#engines) for more details.

## Usage

```php
use NjoguAmos\Waha\Facades\Status;
use NjoguAmos\Waha\Dto\TextStatusData;

$statusData = new TextStatusData(
    text: 'Hello from WhatsApp.',
    backgroundColor: '#38b42f',
    font: 1
);

$result = Status::sendText(session: 'default', data: $statusData);
```

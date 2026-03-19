# Server Version Data DTO Reference

The `NjoguAmos\Waha\Dto\ServerVersionData` represents the version information of the installed WAHA docker image.

```php
use NjoguAmos\Waha\Facades\Observability;
use NjoguAmos\Waha\Dto\ServerVersionData;

$response = Observability::version();
$data = $response->dtoOrFail(); // \NjoguAmos\Waha\Dto\ServerVersionData
```

## `version` → `string`

The version of the installed docker image.

```php
$data->version; // "2024.2.3"
```

## `engine` → `\NjoguAmos\Waha\Enums\Engine`

The engine used by the WAHA server.

```php
$data->engine;        // \NjoguAmos\Waha\Enums\Engine::NOWEB
$data->engine->value; // "NOWEB"
```

## `tier` → `\NjoguAmos\Waha\Enums\Version`

The tier of the WAHA server (e.g., CORE, PLUS).

```php
$data->tier;        // \NjoguAmos\Waha\Enums\Version::PRO
$data->tier->value; // "PLUS"
```

## `browser` → `string|null`

The path to the browser used by the WAHA server.

```php
$data->browser; // "/usr/bin/google-chrome-stable"
```

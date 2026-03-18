# Session Data DTO Reference

The `NjoguAmos\Waha\Dto\SessionData` represents a WhatsApp session information.

```php
use NjoguAmos\Waha\Facades\Session;
use NjoguAmos\Waha\Dto\SessionData;

$session = Session::get()->dtoOrFail(); // SessionData
```

## `name` → `string`

The session name.

```php
$session->name; // "default"
```

## `status` → `string`

The current status of the session (e.g., `WORKING`, `SCAN_QR`, `STARTING`, `STOPPED`).

```php
$session->status; // "WORKING"
```

## `config` → [`SessionConfigData`](./session-config-data.md) or `null`

Session configuration including proxy and webhooks.

```php
$session->config?->debug; // false
```

## `me` → [`SessionMeData`](./session-me-data.md) or `null`

Information about the authenticated user.

```php
$session->me?->id; // "79111111@c.us"
$session->me?->pushName; // "WAHA"
```

## `engine` → [`SessionEngineData`](./session-engine-data.md) or `null`

Information about the engine being used.

```php
$session->engine?->engine; // "NOWEB"
```

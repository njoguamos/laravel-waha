# Session Data DTO Reference

The `NjoguAmos\Waha\Dto\SessionData` represents WhatsApp session information.

```php
use NjoguAmos\Waha\Enums\SessionStatus;
use NjoguAmos\Waha\Facades\Session;
use NjoguAmos\Waha\Dto\SessionData;

$session = Session::get()->dtoOrFail(); // SessionData
```

## `name` → `string`

The session name.

```php
$session->name; // "default"
```

## `status` → [`SessionStatus`](../enums/session-status.md)

The current status of the session.

```php
$session->status; // SessionStatus::WORKING
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

## `presence` → [`Presence`](../enums/presence.md) or `null`

The current presence status of the session.

```php
use NjoguAmos\Waha\Enums\Presence;

$session->presence; // Presence::OFFLINE
```

## `apps` → `array`

The applications associated with the session.

```php
$session->apps; // []
```

## `assignedWorker` → `string` or `null`

The ID of the worker assigned to the session.

```php
$session->assignedWorker; // "worker-1"
```

## `timestamps` → `array` or `null`

Various timestamps associated with session activity.

```php
$session->timestamps['activity']; // 1774197185628
```

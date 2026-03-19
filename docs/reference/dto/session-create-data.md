# Session Create Data DTO Reference

The `NjoguAmos\Waha\Dto\SessionCreateData` represents information for creating a new session.

```php
use NjoguAmos\Waha\Dto\SessionCreateData;
use NjoguAmos\Waha\Dto\SessionConfigData;

$sessionCreateData = new SessionCreateData(
    name: 'default',
    start: true,
    config: new SessionConfigData(
        debug: true
    )
);
```

## `name` → `string`

The session name.

```php
$sessionCreateData->name; // "default"
```

## `start` → `bool`

Whether to start the session immediately after creation. Defaults to `true`.

```php
$sessionCreateData->start; // true
```

## `config` → [`SessionConfigData`](./session-config-data.md) or `null`

Session configuration including proxy and webhooks.

```php
$sessionCreateData->config?->debug; // true
```

## `apps` → `array` or `null`

Additional applications to load with the session.

```php
$sessionCreateData->apps; // null
```

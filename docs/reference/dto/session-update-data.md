# Session Update Data DTO Reference

The `NjoguAmos\Waha\Dto\SessionUpdateData` represents information for updating an existing session configuration.

```php
use NjoguAmos\Waha\Dto\SessionUpdateData;
use NjoguAmos\Waha\Dto\SessionConfigData;

$sessionUpdateData = new SessionUpdateData(
    config: new SessionConfigData(
        debug: true
    )
);
```

## `config` → [`SessionConfigData`](./session-config-data.md) or `null`

Updated session configuration.

```php
$sessionUpdateData->config?->debug; // true
```

## `apps` → `array` or `null`

Updated applications list.

```php
$sessionUpdateData->apps; // null
```

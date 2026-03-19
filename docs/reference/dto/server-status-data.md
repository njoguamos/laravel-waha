# Server Status Data DTO Reference

The `NjoguAmos\Waha\Dto\ServerStatusData` represents the server status, start timestamp, and uptime.

```php
use NjoguAmos\Waha\Facades\Observability;
use NjoguAmos\Waha\Dto\ServerStatusData;

$response = Observability::status();
$data = $response->dtoOrFail(); // \NjoguAmos\Waha\Dto\ServerStatusData
```

## `startTimestamp` → `\Carbon\CarbonImmutable`

The timestamp when the server started.

```php
$data->startTimestamp; // \Carbon\CarbonImmutable instance
```

## `uptime` → `int`

The server uptime in milliseconds.

```php
$data->uptime; // 3600000
```

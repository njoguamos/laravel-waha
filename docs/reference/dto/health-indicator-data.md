# Health Indicator Data DTO Reference

The `NjoguAmos\Waha\Dto\HealthIndicatorData` represents information for a specific health indicator (e.g., disk space, database connection).

## `status` → `\NjoguAmos\Waha\Enums\HealthIndicatorStatus`

The status of the indicator. Usually `up` or `down`.

```php
$data->status;        // \NjoguAmos\Waha\Enums\HealthIndicatorStatus::UP
$data->status->value; // "up"
```

## `path` → `string|null`

The path being monitored (for disk space indicators).

```php
$data->path; // "/tmp/whatsapp-files"
```

## `diskPath` → `string|null`

The disk path being monitored (for disk space indicators).

```php
$data->diskPath; // "/"
```

## `free` → `int|null`

The free space in bytes (for disk space indicators).

```php
$data->free; // 132979355648
```

## `threshold` → `int|null`

The threshold space in bytes (for disk space indicators).

```php
$data->threshold; // 104857600
```

## `message` → `string|null`

A status message (for database connection indicators).

```php
$data->message; // "Up and running"
```

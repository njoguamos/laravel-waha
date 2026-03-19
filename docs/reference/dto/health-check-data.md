# Health Check Data DTO Reference

The `NjoguAmos\Waha\Dto\HealthCheckData` represents the health information of the WAHA server.

```php
use NjoguAmos\Waha\Facades\Observability;
use NjoguAmos\Waha\Dto\HealthCheckData;

$response = Observability::health();
$data = $response->dtoOrFail(); // \NjoguAmos\Waha\Dto\HealthCheckData
```

## `status` → `\NjoguAmos\Waha\Enums\HealthStatus`

The overall health status of the service.

```php
$data->status;        // \NjoguAmos\Waha\Enums\HealthStatus::OK
$data->status->value; // "ok"
```

## `info` → `array<string, HealthIndicatorData>`

Object containing information of each health indicator which is of status `up`.

```php
$data->info; // Array of \NjoguAmos\Waha\Dto\HealthIndicatorData
```

## `error` → `array<string, HealthIndicatorData>`

Object containing information of each health indicator which is of status `down`.

```php
$data->error; // Array of \NjoguAmos\Waha\Dto\HealthIndicatorData
```

## `details` → `array<string, HealthIndicatorData>`

Object containing detailed information of each health indicator.

```php
$data->details; // Array of \NjoguAmos\Waha\Dto\HealthIndicatorData
```

## References

- [Health Indicator Data DTO Reference](/reference/dto/health-indicator-data.md)

# Ping Response Data DTO Reference

The `NjoguAmos\Waha\Dto\PingResponseData` represents the response from the ping endpoint.

```php
use NjoguAmos\Waha\Facades\Observability;

$ping = Observability::ping(); // \NjoguAmos\Waha\Dto\PingResponseData
```

## `message` → `string`

The response message, which is typically `pong`.

```php
$ping->message; // "pong"
```

# Session Webhook Retry Data DTO Reference

The `NjoguAmos\Waha\Dto\SessionWebhookRetryData` contains retry policy configuration for session webhooks.

## `policy` → `string`

The retry policy name.

```php
$retry->policy; // "constant"
```

## `delaySeconds` → `int`

The delay between retry attempts in seconds.

```php
$retry->delaySeconds; // 2
```

## `attempts` → `int`

The maximum number of retry attempts.

```php
$retry->attempts; // 15
```

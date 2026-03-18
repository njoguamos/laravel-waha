# Session Webhook Data DTO Reference

The `NjoguAmos\Waha\Dto\SessionWebhookData` contains webhook configuration.

## `url` → `string`

The webhook URL.

```php
$webhook->url; // "https://example.com/webhook"
```

## `events` → `array`

An array of events that trigger the webhook.

```php
$webhook->events; // ["message", "session.status"]
```

## `hmac` → `string|null`

The HMAC secret for webhook signature verification.

```php
$webhook->hmac; // "secret"
```

## `retries` → `int|null`

The number of retries for failed webhook deliveries.

```php
$webhook->retries; // 3
```

## `customHeaders` → `array|null`

An array of custom headers to include in the webhook request.

```php
$webhook->customHeaders; // ["X-Custom-Header" => "value"]
```

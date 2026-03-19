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

## `hmac` → `SessionWebhookHmacData|null`

The HMAC secret configuration for webhook signature verification.

```php
$webhook->hmac; // Instance of SessionWebhookHmacData
```

## `retries` → `SessionWebhookRetryData|null`

The retry policy configuration for failed webhook deliveries.

```php
$webhook->retries; // Instance of SessionWebhookRetryData
```

## `customHeaders` → `SessionWebhookCustomHeaderData[]|null`

An array of custom headers to include in the webhook request.

```php
$webhook->customHeaders; // Array of SessionWebhookCustomHeaderData objects
```

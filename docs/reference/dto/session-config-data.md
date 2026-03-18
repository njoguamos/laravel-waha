# Session Config Data DTO Reference

The `NjoguAmos\Waha\Dto\SessionConfigData` contains session configuration.

## `proxy` → [`SessionProxyData`](./session-proxy-data.md) or `null`

Proxy server configuration.

```php
$session->config->proxy?->server; // "http://proxy.example.com:8080"
```

## `webhooks` → `array`

An array of [`SessionWebhookData`](./session-webhook-data.md) objects.

```php
foreach ($session->config->webhooks as $webhook) {
    $webhook->url; // "https://example.com/webhook"
}
```

## `debug` → `bool`

Whether debug mode is enabled.

```php
$session->config->debug; // false
```

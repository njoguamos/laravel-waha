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

## `noweb` → [`SessionConfigNowebData`](./session-config-noweb-data.md) or `null`

Configuration specifically for the `NOWEB` engine.

## `webjs` → [`SessionConfigWebjsData`](./session-config-webjs-data.md) or `null`

Configuration specifically for the `WEBJS` engine.

## `client` → [`SessionConfigClientData`](./session-config-client-data.md) or `null`

Configuration for the WhatsApp client (device and browser name).

## `metadata` → `array`

An associative array of additional metadata information.

```php
$session->config->metadata['user.id']; // "123"
```

## `ignore` → [`SessionConfigIgnoreData`](./session-config-ignore-data.md) or `null`

Configuration for ignoring certain types of events.

## `gows` → [`SessionConfigGowsData`](./session-config-gows-data.md) or `null`

Configuration specifically for the `GOWS` engine.

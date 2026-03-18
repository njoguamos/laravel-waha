# Session Proxy Data DTO Reference

The `NjoguAmos\Waha\Dto\SessionProxyData` contains proxy configuration.

## `server` → `string`

The proxy server URL.

```php
$session->config->proxy->server; // "http://proxy.example.com:8080"
```

## `username` → `string`

The proxy server username.

```php
$session->config->proxy->username; // "user"
```

## `password` → `string`

The proxy server password.

```php
$session->config->proxy->password; // "pass"
```

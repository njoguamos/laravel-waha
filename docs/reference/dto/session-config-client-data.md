# Session Config Client Data DTO Reference

The `NjoguAmos\Waha\Dto\SessionConfigClientData` contains configuration for the WhatsApp client.

## `deviceName` → `string` or `null`

The device name that will appear in WhatsApp -> Linked Devices.

```php
$session->config->client->deviceName; // "TEST"
```

## `browserName` → `string` or `null`

The browser name that will appear in WhatsApp -> Linked Devices.

```php
$session->config->client->browserName; // "Chrome"
```

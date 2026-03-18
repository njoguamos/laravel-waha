# Session Config Ignore Data DTO Reference

The `NjoguAmos\Waha\Dto\SessionConfigIgnoreData` contains configuration for ignoring certain events.

## `status` → `bool`

Whether status events should be ignored.

```php
$session->config->ignore->status; // false
```

## `groups` → `bool`

Whether group events should be ignored.

```php
$session->config->ignore->groups; // false
```

## `channels` → `bool`

Whether channel events should be ignored.

```php
$session->config->ignore->channels; // false
```

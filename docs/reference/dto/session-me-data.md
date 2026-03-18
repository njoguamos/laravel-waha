# Session Me Data DTO Reference

The `NjoguAmos\Waha\Dto\SessionMeData` contains information about the authenticated user.

## `id` → `string`

The authenticated user's JID.

```php
$session->me->id; // "79111111@c.us"
```

## `pushName` → `string`

The authenticated user's push name.

```php
$session->me->pushName; // "WAHA"
```

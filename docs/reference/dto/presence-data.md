# Presence Data DTO Reference

The `NjoguAmos\Waha\Dto\PresenceData` represents a presence update.

```php
use NjoguAmos\Waha\Enums\Presence;
use NjoguAmos\Waha\Dto\PresenceData;

$presenceData = new PresenceData(
    presence: Presence::ONLINE,
    chatId: '1234567890@c.us'
);
```

## `presence` → [`Presence`](../enums/presence.md)

The presence status to set.

```php
$presenceData->presence; // Presence::ONLINE
```

## `chatId` → `string` or `null`

The chat ID to set the presence for. This is required for `Presence::TYPING`, `Presence::RECORDING`, and `Presence::PAUSED`.

```php
$presenceData->chatId; // "1234567890@c.us"
```

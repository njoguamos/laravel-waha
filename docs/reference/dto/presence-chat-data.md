# Presence Chat Data DTO Reference

The `NjoguAmos\Waha\Dto\PresenceChatData` represents a single participant's presence information.

```php
use NjoguAmos\Waha\Dto\PresenceChatData;

$presence = PresenceChatData::fromArray([
    'participant'        => '1234567890@c.us',
    'lastKnownPresence' => 'online',
    'lastSeen'           => null,
]);
```

## `participant` → `string`

The participant's WhatsApp ID (contact or group participant).

```php
$presence->participant; // "1234567890@c.us"
```

## `lastKnownPresence` → `string`

The last known presence status. Possible values: `offline`, `online`, `typing`, `recording`, `paused`.

```php
$presence->lastKnownPresence; // "online"
```

## `lastSeen` → `int|null`

Unix timestamp indicating when the participant was last online. `null` if the user is currently online or if last seen is hidden.

```php
$presence->lastSeen; // 1686719326 or null
```

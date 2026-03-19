# Presence Enum Reference

The `NjoguAmos\Waha\Enums\Presence` enum defines the available presence statuses on WhatsApp.

```php
use NjoguAmos\Waha\Enums\Presence;

Presence::ONLINE;    // 'online'
Presence::OFFLINE;   // 'offline'
Presence::TYPING;    // 'typing'
Presence::RECORDING; // 'recording'
Presence::PAUSED;    // 'paused'
```

## Cases

| Case        | Value       | Description                       |
|-------------|-------------|-----------------------------------|
| `ONLINE`    | `online`    | User is online                    |
| `OFFLINE`   | `offline`   | User is offline                   |
| `TYPING`    | `typing`    | User is typing                    |
| `RECORDING` | `recording` | User is recording an audio        |
| `PAUSED`    | `paused`    | User has paused typing/recording  |

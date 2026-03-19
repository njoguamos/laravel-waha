# Set Presence

Set presence status for the session.

## Usage

You can use the `Presence` facade to set the presence status for a session.

### Set global "online"

```php
use NjoguAmos\Waha\Facades\Presence;
use NjoguAmos\Waha\Dto\PresenceData;
use NjoguAmos\Waha\Enums\Presence as PresenceEnum;

$data = new PresenceData(
    presence: PresenceEnum::ONLINE,
);

Presence::set(data: $data);
```

### Set global "offline"

```php
use NjoguAmos\Waha\Facades\Presence;
use NjoguAmos\Waha\Dto\PresenceData;
use NjoguAmos\Waha\Enums\Presence as PresenceEnum;

$data = new PresenceData(
    presence: PresenceEnum::OFFLINE,
);

Presence::set(data: $data);
```

### Start typing

When setting `typing` or `recording` status, you must provide a `chatId`.

```php
use NjoguAmos\Waha\Facades\Presence;
use NjoguAmos\Waha\Dto\PresenceData;
use NjoguAmos\Waha\Enums\Presence as PresenceEnum;

$data = new PresenceData(
    presence: PresenceEnum::TYPING,
    chatId: '1234567890@c.us'
);

Presence::set(data: $data);
```

### Clear "typing" state

Use `paused` to reset the chat presence after you were typing.

```php
use NjoguAmos\Waha\Facades\Presence;
use NjoguAmos\Waha\Dto\PresenceData;
use NjoguAmos\Waha\Enums\Presence as PresenceEnum;

$data = new PresenceData(
    presence: PresenceEnum::PAUSED,
    chatId: '1234567890@c.us'
);

Presence::set(data: $data);
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [`PresenceData` DTO](../../reference/dto/presence-data.md)
- [WAHA Presence Documentation](https://waha.devlike.pro/docs/how-to/presence/)

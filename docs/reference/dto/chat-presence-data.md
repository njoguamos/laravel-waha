# Chat Presence Data DTO Reference

The `NjoguAmos\Waha\Dto\ChatPresenceData` represents presence information for a chat.

```php
use NjoguAmos\Waha\Facades\Presence;
use NjoguAmos\Waha\Dto\ChatPresenceData;

$response = Presence::get(chatId: '1234567890@c.us', session: 'default');
/** @var ChatPresenceData $chatPresence */
$chatPresence = $response->dtoOrFail();
```

## `id` → `string`

The chat ID — either a contact ID (`1234567890@c.us`) or a group chat ID (`111111111111111@g.us`).

```php
$chatPresence->id; // "1234567890@c.us"
```

## `presences` → `list<PresenceChatData>`

List of participant presence information. For a direct chat, there is one participant. For a group, there can be multiple.

```php
foreach ($chatPresence->presences as $presence) {
    $presence->participant;        // "1234567890@c.us"
    $presence->lastKnownPresence;  // "online"
    $presence->lastSeen;           // null or unix timestamp
}
```

## References

- [`PresenceChatData` DTO](/reference/dto/presence-chat-data.md)

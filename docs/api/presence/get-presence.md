# Get All Presence

Get all presence information available for a session. Returns both groups' and personal chats' presence information.

## Usage

::: code-group

```php [Default Session]
use NjoguAmos\Waha\Facades\Presence;

/** @var \Saloon\Http\Response $response */
$response = Presence::all();
```

```php [Specific Session]
use NjoguAmos\Waha\Facades\Presence;

/** @var \Saloon\Http\Response $response */
$response = Presence::all(session: 'my-session');
```

:::

## Response

The response returned by the `all` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or the `dtoOrFail` method to retrieve a list of `ChatPresenceData` DTOs:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   // [["id" => "...", "presences" => [...]], ...]
```

```php [DTO]
use NjoguAmos\Waha\Facades\Presence;
use NjoguAmos\Waha\Dto\ChatPresenceData;

/** @var list<ChatPresenceData> $presences */
$presences = Presence::all()->dtoOrFail();

foreach ($presences as $chatPresence) {
    $chatPresence->id;                    // "1234567890@c.us" or "111111111111111@g.us"
    $chatPresence->presences[0]->lastKnownPresence; // "offline", "online", etc.
    $chatPresence->presences[0]->lastSeen;          // unix timestamp or null
}
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ❌   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA Presence Documentation](https://waha.devlike.pro/docs/how-to/presence/)
- [`ChatPresenceData` DTO](/reference/dto/chat-presence-data.md)

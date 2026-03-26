# Get Chat Presence

Get presence information for a specific chat. For a group, you will get participants' statuses.

## Usage

::: code-group

```php [Default Session]
use NjoguAmos\Waha\Facades\Presence;

/** @var \Saloon\Http\Response $response */
$response = Presence::get(chatId: '1234567890@c.us');
```

```php [Specific Session]
use NjoguAmos\Waha\Facades\Presence;

/** @var \Saloon\Http\Response $response */
$response = Presence::get(chatId: '1234567890@c.us', session: 'my-session');
```

:::

## Response

The response returned by the `get` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or the `dtoOrFail` method to retrieve a `ChatPresenceData` DTO:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   // ["id" => "1234567890@c.us", "presences" => [...]]
```

```php [DTO]
use NjoguAmos\Waha\Facades\Presence;
use NjoguAmos\Waha\Dto\ChatPresenceData;

/** @var ChatPresenceData $chatPresence */
$chatPresence = Presence::get(chatId: '1234567890@c.us')->dtoOrFail();

$chatPresence->id;                    // "1234567890@c.us"
$chatPresence->presences[0]->participant;        // "1234567890@c.us"
$chatPresence->presences[0]->lastKnownPresence;  // "online"
$chatPresence->presences[0]->lastSeen;           // null or unix timestamp
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA Presence Documentation](https://waha.devlike.pro/docs/how-to/presence/)
- [`ChatPresenceData` DTO](/reference/dto/chat-presence-data.md)

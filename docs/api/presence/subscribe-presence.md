# Subscribe to Presence

Subscribe to presence information for a specific chat. You can later retrieve presence information via [Get Chat Presence](./get-chat-presence.md) or by listening to the `presence.update` webhook event.

## Usage

::: code-group

```php [Default Session]
use NjoguAmos\Waha\Facades\Presence;

/** @var \Saloon\Http\Response $response */
$response = Presence::subscribe(chatId: '1234567890@c.us');
```

```php [Specific Session]
use NjoguAmos\Waha\Facades\Presence;

/** @var \Saloon\Http\Response $response */
$response = Presence::subscribe(chatId: '1234567890@c.us', session: 'my-session');
```

:::

## Response

The response returned by the `subscribe` method is an instance of `Saloon\Http\Response`:

```php
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->ok();     // true
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA Presence Documentation](https://waha.devlike.pro/docs/how-to/presence/)

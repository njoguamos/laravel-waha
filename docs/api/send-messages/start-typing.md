# Start Typing

Show "typing..." status in the chat.

## Usage

The `Message` facade's `startTyping` method may be used to show "typing..." status in a chat.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\ChatData;

$data = new ChatData(
    chatId: '123456789@c.us',
);

/** @var \Saloon\Http\Response $response */
$response = Message::startTyping(data: $data);
```

:::

## Response

The response returned by the `startTyping` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 201
$response->json();   // ["status" => "success", ...]
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ✔️ | ✔️ | ✔️ | ✔️ |

## References

- [`ChatData` DTO](/reference/dto/chat-data.md)
- [WAHA Documentation: Start/Stop Typing](https://waha.devlike.pro/docs/how-to/send-messages/#startstop-typing)

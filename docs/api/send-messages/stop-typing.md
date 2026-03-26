# Stop Typing

Stop showing "typing..." status in the chat.

## Usage

The `Message` facade's `stopTyping` method may be used to stop showing "typing..." status in a chat.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\ChatRequestData;

$data = new ChatRequestData(
    chatId: '123456789@c.us',
);

/** @var \Saloon\Http\Response $response */
$response = Message::stopTyping(data: $data);
```

:::

## Response

The response returned by the `stopTyping` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

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

- [`ChatRequestData` DTO](/reference/dto/chat-request-data.md)
- [WAHA Documentation: Start/Stop Typing](https://waha.devlike.pro/docs/how-to/send-messages/#startstop-typing)

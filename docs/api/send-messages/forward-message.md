# Forward Message

Forward existing messages to other chats.

## Usage

The `Message` facade's `forwardMessage` method may be used to forward an existing message to another chat.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageForwardData;

$data = new MessageForwardData(
    chatId: '123456789@c.us',
    messageId: 'false_11111111111@c.us_AAAAAAAAAAAAAAAAAAAA',
);

/** @var \Saloon\Http\Response $response */
$response = Message::forwardMessage(data: $data);
```

:::

## Response

The response returned by the `forwardMessage` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 201
$response->json();   // ["id" => "false_123456789@c.us_BAE6A33293978B16", "timestamp" => 1629200000, ...]
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ✔️ | ✔️ | | ✔️ |

## References

- [`MessageForwardData` DTO](/reference/dto/message-forward-data.md)
- [WAHA Documentation: Forward Message](https://waha.devlike.pro/docs/how-to/send-messages/#forward-message)

# Send Reaction

Send a reaction to a message.

## Usage

The `Message` facade's `sendReaction` method may be used to send a reaction to a message.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageReactionData;

$data = new MessageReactionData(
    chatId: '123456789@c.us',
    messageId: 'true_123456789@c.us_BAE6A33293978B16',
    reaction: '👍',
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendReaction(data: $data);
```

:::

## Response

The response returned by the `sendReaction` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

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
| ✔️ | ✔️ | ✔️ | ✔️ |

## References

- [`MessageReactionData` DTO](/reference/dto/message-reaction-data.md)
- [WAHA Documentation: Send Reaction](https://waha.devlike.pro/docs/how-to/send-messages/#send-reaction)

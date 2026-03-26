# Star Message

Star or unstar a message.

## Usage

The `Message` facade's `starMessage` method may be used to star or unstar a message.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageStarData;

$data = new MessageStarData(
    chatId: '123456789@c.us',
    messageId: 'true_123456789@c.us_BAE6A33293978B16',
    star: true,
);

/** @var \Saloon\Http\Response $response */
$response = Message::starMessage(data: $data);
```

:::

## Response

The response returned by the `starMessage` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

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
| ✔️ | ✔️ | ✔️ | |

## References

- [`MessageStarData` DTO](/reference/dto/message-star-data.md)
- [WAHA Documentation: Star Message](https://waha.devlike.pro/docs/how-to/send-messages/#star-message)

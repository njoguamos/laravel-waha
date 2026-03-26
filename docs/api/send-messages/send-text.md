# Send Text

Use the API to send text messages to the chat.

## Usage

The `Message` facade's `sendText` method may be used to send text messages to a chat.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageTextData;

$data = new MessageTextData(
    chatId: '123456789@c.us',
    text: 'Hello World!',
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendText(data: $data);
```

```php [Reply]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageTextData;

$data = new MessageTextData(
    chatId: '123456789@c.us',
    text: 'This is a reply',
    reply_to: 'false_1111@c.us_AAA',
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendText(data: $data);
```

```php [Mentions]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageTextData;

$data = new MessageTextData(
    chatId: '123456789@g.us',
    text: 'Hello @123456789',
    mentions: ['123456789@c.us'],
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendText(data: $data);
```

```php [Link Preview]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageTextData;

$data = new MessageTextData(
    chatId: '123456789@c.us',
    text: 'Check this out: https://waha.devlike.pro/',
    linkPreview: true,
    linkPreviewHighQuality: true,
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendText(data: $data);
```

:::

::: warning Send Typing Status
Enabling `send_typing_status` in your `config/waha.php` reduces the chances of being blocked by WhatsApp but may add 3–30 seconds of blocking latency to every `sendText()` call.

The package mimics human behavior by sending "online", "typing", and "paused" presence statuses. If any of these presence updates fail (e.g., due to engine limitations), the error is logged, and the message sending continues.
:::

## Response

The response returned by the `sendText` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

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

- [`MessageTextData` DTO](/reference/dto/message-text-data.md)
- [WAHA Documentation: Send Text](https://waha.devlike.pro/docs/how-to/send-messages/#send-text)

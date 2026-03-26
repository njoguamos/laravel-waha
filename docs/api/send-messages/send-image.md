# Send Image

Send image to a chat.

## Usage

The `Message` facade's `sendImage` method may be used to send an image to a chat. You must provide a `MessageImageData` DTO.

::: code-group

```php [URL]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageImageData;

$data = new MessageImageData(
    chatId: '123456789@c.us',
    file: ['url' => 'https://example.com/image.jpg'],
    caption: 'Check this out!',
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendImage(data: $data);
```

```php [BASE64]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageImageData;

$data = new MessageImageData(
    chatId: '123456789@c.us',
    file: [
        'mimetype' => 'image/jpeg',
        'filename' => 'image.jpg',
        'data'     => 'base64-encoded-data...',
    ],
    caption: 'Check this out!',
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendImage(data: $data);
```

```php [Reply to Message]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageImageData;

$data = new MessageImageData(
    chatId: '123456789@c.us',
    file: ['url' => 'https://example.com/image.jpg'],
    reply_to: 'false_1111@c.us_AAA',
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendImage(data: $data);
```

:::

## Response

The response returned by the `sendImage` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 201
$response->json();   // ["id" => "false_123456789@c.us_BAE6A33293978B16", "timestamp" => 1629200000, ...]
```

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageImageData;

$data = new MessageImageData(
    chatId: '123456789@c.us',
    file: ['url' => 'https://example.com/image.jpg'],
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendImage(data: $data);
$json = $response->json();
```

:::

::: warning Image File Format
WhatsApp works best when images are sent in JPEG format. You must convert to JPEG `image/jpeg` before sending.
In your request, set `file.mimetype` to `image/jpeg` and use a `.jpg/.jpeg` filename.
:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ➕ | ➕ | ➕ | ➕ |

## References

- [`MessageImageData` DTO](/reference/dto/message-image-data.md)
- [WAHA Documentation: Send Image](https://waha.devlike.pro/docs/how-to/send-messages/#send-image)

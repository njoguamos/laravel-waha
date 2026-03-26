# Send Video

Send videos to your contacts.

## Usage

The `Message` facade's `sendVideo` method may be used to send a video to a contact or group.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageVideoData;

$data = new MessageVideoData(
    chatId: '123456789@c.us',
    file: ['url' => 'https://example.com/video.mp4'],
    caption: 'Watch this!',
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendVideo(data: $data);
```

```php [Reply]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageVideoData;

$data = new MessageVideoData(
    chatId: '123456789@c.us',
    file: ['url' => 'https://example.com/video.mp4'],
    reply_to: 'false_1111@c.us_AAA',
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendVideo(data: $data);
```

:::

## Response

The response returned by the `sendVideo` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

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
| ➕ | ➕ | ➕ | ➕ |

## References

- [`MessageVideoData` DTO](/reference/dto/message-video-data.md)
- [WAHA Documentation: Send Video](https://waha.devlike.pro/docs/how-to/send-messages/#send-video)

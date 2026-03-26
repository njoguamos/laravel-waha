# Send Video

Send videos to your contacts.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageVideoData;

$data = new MessageVideoData(
    chatId: '123456789@c.us',
    file: ['url' => 'https://example.com/video.mp4'],
    caption: 'Watch this!',
);

$response = Message::sendVideo(data: $data);
```

```php [Response]
$response = Message::sendVideo(data: $data);

// Get JSON response
$json = $response->json();
```

:::

## Reply to message

```php
$data = new MessageVideoData(
    chatId: '123456789@c.us',
    file: ['url' => 'https://example.com/video.mp4'],
    reply_to: 'false_1111@c.us_AAA',
);

$response = Message::sendVideo(data: $data);
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ➕ | ➕ | ➕ | ➕ |

## References

- [`MessageVideoData` DTO](/reference/dto/message-video-data.md)
- [WAHA Documentation: Send Video](https://waha.devlike.pro/docs/how-to/send-messages/#send-video)

# Send Image

Send images to your contacts.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageImageData;

$data = new MessageImageData(
    chatId: '123456789@c.us',
    file: ['url' => 'https://example.com/image.jpg'],
    caption: 'Check this out!',
);

$response = Message::sendImage(data: $data);
```

```php [Response]
$response = Message::sendImage(data: $data);

// Get JSON response
$json = $response->json();
```

:::

## Reply to message

```php
$data = new MessageImageData(
    chatId: '123456789@c.us',
    file: ['url' => 'https://example.com/image.jpg'],
    reply_to: 'false_1111@c.us_AAA',
);

$response = Message::sendImage(data: $data);
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ➕ | ➕ | ➕ | ➕ |

## References

- [`MessageImageData` DTO](/reference/dto/message-image-data.md)
- [WAHA Documentation: Send Image](https://waha.devlike.pro/docs/how-to/send-messages/#send-image)

# Send File

Send files (documents) to your contacts.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageFileData;

$data = new MessageFileData(
    chatId: '123456789@c.us',
    file: ['url' => 'https://example.com/document.pdf'],
    caption: 'Important document',
);

$response = Message::sendFile(data: $data);
```

```php [Response]
$response = Message::sendFile(data: $data);

// Get JSON response
$json = $response->json();
```

:::

## Reply to message

```php
$data = new MessageFileData(
    chatId: '123456789@c.us',
    file: ['url' => 'https://example.com/document.pdf'],
    reply_to: 'false_1111@c.us_AAA',
);

$response = Message::sendFile(data: $data);
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ➕ | ➕ | ➕ | ➕ |

## References

- [`MessageFileData` DTO](/reference/dto/message-file-data.md)
- [WAHA Documentation: Send File](https://waha.devlike.pro/docs/how-to/send-messages/#send-file)

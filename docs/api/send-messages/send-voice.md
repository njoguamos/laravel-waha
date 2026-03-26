# Send Voice

Send voice messages (audio recordings) to your contacts.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageVoiceData;

$data = new MessageVoiceData(
    chatId: '123456789@c.us',
    file: ['url' => 'https://example.com/voice.opus'],
    convert: true,
);

$response = Message::sendVoice(data: $data);
```

```php [Response]
$response = Message::sendVoice(data: $data);

// Get JSON response
$json = $response->json();
```

:::

## Reply to message

```php
$data = new MessageVoiceData(
    chatId: '123456789@c.us',
    file: ['url' => 'https://example.com/voice.opus'],
    convert: true,
    reply_to: 'false_1111@c.us_AAA',
);

$response = Message::sendVoice(data: $data);
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ➕ | ➕ | ➕ | ➕ |

## References

- [`MessageVoiceData` DTO](/reference/dto/message-voice-data.md)
- [WAHA Documentation: Send Voice](https://waha.devlike.pro/docs/how-to/send-messages/#send-voice)

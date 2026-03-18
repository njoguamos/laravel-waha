# Send Text

Use the API to send text messages to the chat.

```php
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageTextData;

$data = new MessageTextData(
    chatId: '123456789@c.us',
    text: 'Hello World!',
);

$response = Message::sendText(data: $data);
```

### Reply to message

To reply to a message, use the `reply_to` field:

```php
$data = new MessageTextData(
    chatId: '123456789@c.us',
    text: 'This is a reply',
    reply_to: 'false_1111@c.us_AAA',
);

$response = Message::sendText(data: $data);
```

### Mentions

To mention a contact in a group, use the `mentions` field:

```php
$data = new MessageTextData(
    chatId: '123456789@g.us',
    text: 'Hello @123456789',
    mentions: ['123456789@c.us'],
);

$response = Message::sendText(data: $data);
```

### Link Preview

By default, WAHA generates a preview for links in the message. You can control this using the `linkPreview` and `linkPreviewHighQuality` fields:

```php
$data = new MessageTextData(
    chatId: '123456789@c.us',
    text: 'Check this out: https://waha.devlike.pro/',
    linkPreview: true,
    linkPreviewHighQuality: true,
);

$response = Message::sendText(data: $data);
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ✅ | ✅ | ✅ | ✅ |

## References

- [WAHA Documentation: Send Text](https://waha.devlike.pro/docs/how-to/send-messages/#send-text)

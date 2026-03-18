# Send Seen

Send a read receipt (double green tick) for messages in a chat.

```php
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\SeenData;

$data = new SeenData(
    chatId: '123456789@c.us',
);

$response = Message::sendSeen(data: $data);
```

## Read specific messages

In **NOWEB** and **GOWS** Engines you can control what messages to read by using `messageIds` field:

```php
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\SeenData;

$data = new SeenData(
    chatId: '123456789@c.us',
    messageIds: ['false_123456789@c.us_AAAAAAAAAAAAAAAAAAAA'],
);

$response = Message::sendSeen(data: $data);
```

## Group Messages

For Group Message you need to provide `participant` field:

```php
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\SeenData;

$data = new SeenData(
    chatId: '123456789@g.us',
    messageIds: ['false_123456789@g.us_AAAAAAAAAAAAAAAAAAAA_987654321@c.us'],
    participant: '987654321@c.us',
);

$response = Message::sendSeen(data: $data);
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ✅ | ✅ | ✅ | ✅ |

## References

- [WAHA Documentation: Send Seen](https://waha.devlike.pro/docs/how-to/send-messages/#send-seen)

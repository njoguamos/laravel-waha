# Forward Message

Forward existing messages to other chats.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageForwardData;

$data = new MessageForwardData(
    chatId: '123456789@c.us',
    messageId: 'false_11111111111@c.us_AAAAAAAAAAAAAAAAAAAA',
);

$response = Message::forwardMessage(data: $data);
```

```php [Response]
$response = Message::forwardMessage(data: $data);

// Get JSON response
$json = $response->json();
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ✅ | ✅ | | ✅ |

## References

- [`MessageForwardData` DTO](/reference/dto/message-forward-data.md)
- [WAHA Documentation: Forward Message](https://waha.devlike.pro/docs/how-to/send-messages/#forward-message)

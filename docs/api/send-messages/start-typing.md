# Start Typing

Show "typing..." status in the chat.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\ChatData;

$data = new ChatData(
    chatId: '123456789@c.us',
);

$response = Message::startTyping(data: $data);
```

```php [Response]
$response = Message::startTyping(data: $data);

// Get JSON response
$json = $response->json();
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [`ChatData` DTO](/reference/dto/chat-data.md)
- [WAHA Documentation: Start/Stop Typing](https://waha.devlike.pro/docs/how-to/send-messages/#startstop-typing)

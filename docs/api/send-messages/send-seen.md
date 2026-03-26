# Send Seen

Send a read receipt (double green tick) for messages in a chat.

## Usage

The `Message` facade's `sendSeen` method may be used to send a read receipt (double green tick) for messages in a chat.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\SeenData;

$data = new SeenData(
    chatId: '123456789@c.us',
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendSeen(data: $data);
```

```php [Specific Messages]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\SeenData;

$data = new SeenData(
    chatId: '123456789@c.us',
    messageIds: ['false_123456789@c.us_AAAAAAAAAAAAAAAAAAAA'],
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendSeen(data: $data);
```

```php [Group Messages]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\SeenData;

$data = new SeenData(
    chatId: '123456789@g.us',
    messageIds: ['false_123456789@g.us_AAAAAAAAAAAAAAAAAAAA_987654321@c.us'],
    participant: '987654321@c.us',
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendSeen(data: $data);
```

:::

## Response

The response returned by the `sendSeen` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 201
$response->json();   // ["status" => "success", ...]
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ✔️ | ✔️ | ✔️ | ✔️ |

## References

- [`SeenData` DTO](/reference/dto/seen-data.md)
- [WAHA Documentation: Send Seen](https://waha.devlike.pro/docs/how-to/send-messages/#send-seen)

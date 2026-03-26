# Send Buttons Reply

Send a reply to a button message.

## Usage

The `Message` facade's `sendButtonsReply` method may be used to send a reply to a button message.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageButtonReplyData;

$data = new MessageButtonReplyData(
    chatId: '123456789@c.us',
    selectedDisplayText: 'Yes',
    selectedButtonID: 'btn-yes',
    replyTo: 'false_123456789@c.us_BAE6A33293978B16',
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendButtonsReply(data: $data);
```

:::

## Response

The response returned by the `sendButtonsReply` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

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
| ➕ | | | |

## References

- [`MessageButtonReplyData` DTO](/reference/dto/message-button-reply-data.md)
- [WAHA Documentation: Send Buttons Reply](https://waha.devlike.pro/docs/how-to/send-messages/#send-buttons-reply)

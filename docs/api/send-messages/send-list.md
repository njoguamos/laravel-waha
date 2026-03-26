# Send List

::: warning List Messages May Stop Working Anytime
List Messages are fragile creatures and may stop working at any time.

We recommend adding fallback logic using Send Text or 📶 Polls.
:::

## Only Direct Message Chats

List Messages can only be sent to direct chats (1:1).

The chatId must be one of the following formats: `phone`, `phone@c.us`, `{number}@lids`.

## Usage

The `Message` facade's `sendList` method may be used to send an interactive list message to a chat.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageListData;
use NjoguAmos\Waha\Dto\MessageListRowData;
use NjoguAmos\Waha\Dto\MessageListSectionData;

$data = new MessageListData(
    chatId: '123456789@c.us',
    title: 'Simple Menu',
    button: 'Choose',
    sections: [
        new MessageListSectionData(
            title: 'Main',
            rows: [
                new MessageListRowData(title: 'Option 1', rowId: 'option1'),
                new MessageListRowData(title: 'Option 2', rowId: 'option2', description: 'Second option'),
            ],
        ),
    ],
    description: 'Please choose an option',
    footer: 'Thank you!',
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendList(data: $data);
```

:::

## Response

The response returned by the `sendList` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

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
| | | ➕ | ➕ |

## References

- [`MessageListData` DTO](/reference/dto/message-list-data.md)
- [`MessageListSectionData` DTO](/reference/dto/message-list-section-data.md)
- [`MessageListRowData` DTO](/reference/dto/message-list-row-data.md)
- [WAHA Documentation: Send List](https://waha.devlike.pro/docs/how-to/send-messages/#send-list)

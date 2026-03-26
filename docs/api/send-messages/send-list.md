# Send List

Send interactive list messages.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageListData;
use NjoguAmos\Waha\Dto\SendListMessageData;
use NjoguAmos\Waha\Dto\ListSectionData;
use NjoguAmos\Waha\Dto\ListSectionRowData;

$data = new MessageListData(
    chatId: '123456789@c.us',
    message: new SendListMessageData(
        button: 'Choose',
        sections: [
            new ListSectionData(
                title: 'Main',
                rows: [
                    new ListSectionRowData(title: 'Option 1', rowId: 'option1'),
                    new ListSectionRowData(title: 'Option 2', rowId: 'option2', description: 'Second option'),
                ],
            ),
        ],
        title: 'Simple Menu',
        description: 'Please choose an option',
        footer: 'Thank you!',
    ),
);

$response = Message::sendList(data: $data);
```

```php [Response]
$response = Message::sendList(data: $data);

// Get JSON response
$json = $response->json();
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ➕ | ➕ | ➕ | ➕ |

## References

- [`MessageListData` DTO](/reference/dto/message-list-data.md)
- [`SendListMessageData` DTO](/reference/dto/send-list-message-data.md)
- [`ListSectionData` DTO](/reference/dto/list-section-data.md)
- [`ListSectionRowData` DTO](/reference/dto/list-section-row-data.md)
- [WAHA Documentation: Send List](https://waha.devlike.pro/docs/how-to/send-messages/#send-list)

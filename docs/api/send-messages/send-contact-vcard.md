# Send Contact Vcard

Send one or more contacts as VCards.

## Usage

The `Message` facade's `sendContactVcard` method may be used to send one or more contacts as VCards to a chat.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\VCardContactData;
use NjoguAmos\Waha\Dto\MessageContactVcardData;

$data = new MessageContactVcardData(
    chatId: '123456789@c.us',
    contacts: [
        new VCardContactData(
            vcard: "BEGIN:VCARD\nVERSION:3.0\nFN:Jane Doe\nTEL;type=CELL;waid=123456789:123456789\nEND:VCARD"
        ),
    ],
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendContactVcard(data: $data);
```

:::

## Response

The response returned by the `sendContactVcard` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

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
| ✔️ | ✔️ | ✔️ | ✔️ |

## References

- [`MessageContactVcardData` DTO](/reference/dto/message-contact-vcard-data.md)
- [`VCardContactData` DTO](/reference/dto/vcard-contact-data.md)
- [WAHA Documentation: Send Contact Vcard](https://waha.devlike.pro/docs/how-to/send-messages/#send-contact-vcard)

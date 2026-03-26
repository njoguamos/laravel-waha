# Send Link Custom Preview

Send a message with a custom link preview.

## Usage

The `Message` facade's `sendLinkCustomPreview` method may be used to send a message with a custom link preview to a chat.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\LinkPreviewData;
use NjoguAmos\Waha\Dto\MessageLinkCustomPreviewData;

$data = new MessageLinkCustomPreviewData(
    chatId: '123456789@c.us',
    text: 'Check this out! https://github.com/',
    preview: new LinkPreviewData(
        url: 'https://github.com/',
        title: 'GitHub',
        description: 'Where the world builds software',
    ),
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendLinkCustomPreview(data: $data);
```

:::

## Response

The response returned by the `sendLinkCustomPreview` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

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

- [`MessageLinkCustomPreviewData` DTO](/reference/dto/message-link-custom-preview-data.md)
- [`LinkPreviewData` DTO](/reference/dto/link-preview-data.md)
- [WAHA Documentation: Send Link Custom Preview](https://waha.devlike.pro/docs/how-to/send-messages/#send-link-custom-preview)

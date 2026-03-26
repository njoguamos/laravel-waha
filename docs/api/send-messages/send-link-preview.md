# Send Link Preview

Send a message with a custom link preview.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageLinkCustomPreviewData;
use NjoguAmos\Waha\Dto\LinkPreviewData;

$data = new MessageLinkCustomPreviewData(
    chatId: '123456789@c.us',
    text: 'Check this out! https://github.com/',
    preview: new LinkPreviewData(
        url: 'https://github.com/',
        title: 'GitHub',
        description: 'Where the world builds software',
    ),
);

$response = Message::sendLinkCustomPreview(data: $data);
```

```php [Response]
$response = Message::sendLinkCustomPreview(data: $data);

// Get JSON response
$json = $response->json();
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ➕ | ➕ | | |

## References

- [`MessageLinkCustomPreviewData` DTO](/reference/dto/message-link-custom-preview-data.md)
- [`LinkPreviewData` DTO](/reference/dto/link-preview-data.md)
- [WAHA Documentation: Send Link Preview](https://waha.devlike.pro/docs/how-to/send-messages/#send-link-with-custom-preview)

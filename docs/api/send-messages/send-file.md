# Send File

Send files (documents) to a chat.

## Usage

The `Message` facade's `sendFile` method may be used to send a file to a chat. You must provide a `MessageFileData` DTO.

::: code-group

```php [URL]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageFileData;

$data = new MessageFileData(
    chatId: '123456789@c.us',
    file: 'https://example.com/document.pdf',
    caption: 'Check this out!',
);

$response = Message::sendFile(data: $data);
```

```php [BASE64]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageFileData;

$data = new MessageFileData(
    chatId: '123456789@c.us',
    file: 'data:application/pdf;base64,base64-encoded-data...',
    filename: 'document.pdf',
    caption: 'Check this out!',
);

$response = Message::sendFile(data: $data);
```

```php [Mimetype Enum]
use NjoguAmos\Waha\Enums\FileType;
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageFileData;

$data = new MessageFileData(
    chatId: '123456789@c.us',
    file: 'https://example.com/document.pdf',
    mimetype: FileType::PDF,
    caption: 'Check this out!',
);

$response = Message::sendFile(data: $data);
```

```php [Reply to Message]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageFileData;

$data = new MessageFileData(
    chatId: '123456789@c.us',
    file: 'https://example.com/document.pdf',
    reply_to: 'false_1111@c.us_AAA',
);

$response = Message::sendFile(data: $data);
```

:::

::: info Automatic Mimetype and Filename

When using a URL, the package will automatically determine the mimetype based on the file extension and use the base name of the URL as the filename.

For Base64 data, if you use a data URI (e.g., `data:application/pdf;base64,...`), the mimetype will be extracted automatically. Otherwise, you can provide the `mimetype` and `filename` parameters to the `MessageFileData` DTO.
:::

## Response

The response returned by the `sendFile` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 201
$response->json();   // ["id" => "...", ...]
```

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageFileData;

$data = new MessageFileData(
    chatId: '123456789@c.us',
    file: 'https://example.com/document.pdf',
);

$response = Message::sendFile(data: $data);
$json = $response->json();
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ➕   |  ➕  |   ➕   |  ➕   |

## References

- [`MessageFileData` DTO](/reference/dto/message-file-data.md)
- [WAHA Documentation: Send File](https://waha.devlike.pro/docs/how-to/send-messages/#send-file)

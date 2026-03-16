# Image Status Data DTO Reference

The `NjoguAmos\Waha\Dto\ImageStatusData` represents a WhatsApp image status message.

```php
use NjoguAmos\Waha\Facades\Status;
use NjoguAmos\Waha\Dto\ImageStatusData;

$data = new ImageStatusData(
    file: 'https://example.com/image.jpg',
    caption: 'Sunset'
);

$result = Status::sendImage(data: $data, session: 'default'); // \Saloon\Http\Response
```

## `file` → `string`

The image file data. It can be a URL, raw base64 data, or a base64 data URI.

The DTO automatically detects the mime type and ensures the file is an image.

```php
$data->file; // "https://example.com/image.jpg"
```

## `caption` → `string|null`

Caption for the image status message.

```php
$data->caption; // "Sunset" or null
```

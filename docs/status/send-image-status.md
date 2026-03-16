# Send Image Status

Send an image status message on WhatsApp.

## Usage

### With Image URL

```php
use NjoguAmos\Waha\Facades\Status;
use NjoguAmos\Waha\Dto\ImageStatusData;

$data = new ImageStatusData(
    file: Storage::disk('s3')->url('images/my-image.jpg'),
    caption: 'Image caption'
);

$result = Status::sendImage(data: $data);
```

### With Base64 Data

```php
use NjoguAmos\Waha\Facades\Status;
use NjoguAmos\Waha\Dto\ImageStatusData;

$data = new ImageStatusData(
    file: '/9j/4AAQSkZJRgABAQAAAQABAAD/4gIoSUNDX1BST0ZJTEUAAQEAAAIYAAAA...',
    caption: 'Image from base64'
);

$result = Status::sendImage(data: $data);
```

### With Data URI

```php
use NjoguAmos\Waha\Facades\Status;
use NjoguAmos\Waha\Dto\ImageStatusData;

$data = new ImageStatusData(
    file: 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/4gIoSUNDX1BST0ZJTEUAAQEAAAIYAAAA...',
    caption: 'Image from data URI'
);

$result = Status::sendImage(data: $data);
```

## Result

The response is an instance of `Saloon\Http\Response`.

```php
$result->status(); // 201
$result->json();   // ["file" => [...], "caption" => "Image ", ...]
```

## Parameters

| Parameter | Type               | Required | Description                                                          |
|-----------|--------------------|----------|----------------------------------------------------------------------|
| `file`    | `string`           | Yes      | The image file. Can be a URL, raw base64 data, or a base64 data URI. |
| `caption` | `string` or `null` | No       | Caption for the image status.                                        |

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ✅   |  ➕  |   ✅   |  ✅   |

## Important Links

- [WAHA API Documentation - Send Image Status](https://waha.devlike.pro/docs/how-to/status/#send-image-status)
- [ImageStatusData DTO Reference](../reference/dto/image-status-data)

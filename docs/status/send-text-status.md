# Send Text Status

Send a text status message on WhatsApp.

## Usage

```php
use NjoguAmos\Waha\Facades\Status;
use NjoguAmos\Waha\Dto\TextStatusData;

$data = new TextStatusData(text: 'Hello from WhatsApp!');

$result = Status::sendText(data: $data);
```

### With Custom Background

```php
use NjoguAmos\Waha\Facades\Status;
use NjoguAmos\Waha\Dto\TextStatusData;

$data = new TextStatusData(
    text: 'Hello from WhatsApp!',
    backgroundColor: '#38b42f'
);

$result = Status::sendText(data: $data);
```

### With Contacts

```php
use NjoguAmos\Waha\Facades\Status;
use NjoguAmos\Waha\Dto\TextStatusData;

$data = new TextStatusData(
    text: 'Hello from WhatsApp!',
    contacts: ['123456789@c.us', '987654321@c.us']
);

$result = Status::sendText(data: $data);
```

## Result

The response is an instance of `Saloon\Http\Response`.

```php
$result->status(); // 201
$result->json();   // ["text" => "Hello from WhatsApp!", ...]
```

## Parameters

| Parameter        | Type           | Required | Description                                                |
|------------------|----------------|----------|------------------------------------------------------------|
| `text`           | `string`       | Yes      | The status message text                                    |
| `backgroundColor`| `string`       | No       | Background color in hex format (e.g., `#38b42f`). If not provided, a random background will be generated. |
| `font`           | `int`          | Yes      | Font style (1-5)                                           |
| `contacts`       | `array\|null`  | No       | Array of chat IDs to send status to                        |

## Engines

| WEBJS | WPP  | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA API Documentation - Send Text Status](https://waha.devlike.pro/docs/how-to/status/#send-text-status)
- [`TextStatusData` DTO](../reference/dto/text-status-data.md)

# Send Text Status

Send a text status message on WhatsApp.

## Usage

```php
use NjoguAmos\Waha\Facades\Status;
use NjoguAmos\Waha\Dto\TextStatusData;

$data = new TextStatusData(
    text: 'Hello from WhatsApp!',
    backgroundColor: '#38b42f',
    font: 1
);

$result = Status::sendText(session: 'default', data: $data);
```

### With Contacts

```php
use NjoguAmos\Waha\Facades\Status;
use NjoguAmos\Waha\Dto\TextStatusData;

$data = new TextStatusData(
    text: 'Hello from WhatsApp!',
    backgroundColor: '#38b42f',
    font: 1,
    contacts: ['123456789@c.us', '987654321@c.us']
);

$result = Status::sendText(session: 'default', data: $data);
```

## Result

The response is an instance of `NjoguAmos\Waha\Dto\TextStatusData`.

```php
$result->text;            // "Hello from WhatsApp!"
$result->backgroundColor; // "#38b42f"
$result->font;            // 1
$result->contacts;        // ["123456789@c.us", ...] or null
```

## Parameters

| Parameter        | Type           | Required | Description                                                |
|------------------|----------------|----------|------------------------------------------------------------|
| `text`           | `string`       | Yes      | The status message text                                    |
| `backgroundColor`| `string`       | Yes      | Background color in hex format (e.g., `#38b42f`)           |
| `font`           | `int`          | Yes      | Font style (1-5)                                           |
| `contacts`       | `array\|null`  | No       | Array of chat IDs to send status to                        |

## Important Links

- [WAHA API Documentation - Send Text Status](https://waha.devlike.pro/docs/how-to/status/#send-text-status)
- [TextStatusData DTO Reference](../reference/dto/text-status-data)

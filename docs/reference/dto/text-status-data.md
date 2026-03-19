# Text Status Data DTO Reference

The `NjoguAmos\Waha\Dto\TextStatusData` represents a WhatsApp text status message.

```php
use NjoguAmos\Waha\Facades\Status;
use NjoguAmos\Waha\Dto\TextStatusData;

$data = new TextStatusData(
    text: 'Hello from WhatsApp!',
    backgroundColor: '#38b42f',
    font: 1
);

$result = Status::sendText(data: $data, session: 'default'); // \Saloon\Http\Response
```

## `text` → `string`

The status message text content.

```php
$data->text; // "Hello from WhatsApp!"
```

## `backgroundColor` → `string|null`

Background color in hex format. If not provided, a random background color will be generated.

```php
$data->backgroundColor; // "#38b42f"
```

## `font` → `int`

Font style identifier (1-5).

```php
$data->font; // 1
```

## `contact` → `array|null`

Array of chat IDs to send the status to. `null` if not specified.

```php
$data->contact; // ["123456789@c.us", "987654321@c.us"] or null
```

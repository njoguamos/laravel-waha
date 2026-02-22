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

$result = Status::sendText(session: 'default', data: $data); // TextStatusData
```

## `text` → `string`

The status message text content.

```php
$result->text; // "Hello from WhatsApp!"
```

## `backgroundColor` → `string`

Background color in hex format.

```php
$result->backgroundColor; // "#38b42f"
```

## `font` → `int`

Font style identifier (1-5).

```php
$result->font; // 1
```

## `contacts` → `array|null`

Array of chat IDs to send the status to. `null` if not specified.

```php
$result->contacts; // ["123456789@c.us", "987654321@c.us"] or null
```

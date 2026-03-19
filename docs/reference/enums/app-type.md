# App Type

`NjoguAmos\Waha\Enums\AppType`

The `AppType` enum defines the types of applications available to connect in WAHA.

## Cases

| Case | Value | Label | Description |
| :--- | :--- | :--- | :--- |
| `CHATWOOT` | `chatwoot` | `ChatWoot` | Use your WhatsApp in ChatWoot CRM. |
| `CALLS` | `calls` | `Calls` | Automatically reject calls and auto-reply with a message. |

## Methods

### `label()`

Returns the human-readable label for the app type.

### `description()`

Returns a brief description of the app type.

## Usage

```php
use NjoguAmos\Waha\Enums\AppType;

$type = AppType::CHATWOOT;

echo $type->value; // 'chatwoot'
echo $type->label(); // 'ChatWoot'
echo $type->description(); // 'Use your WhatsApp in ChatWoot CRM'
```

## References

- [WAHA Apps Documentation](https://waha.devmonkeys.org/docs/apps/)

# Send Location

Send location (latitude and longitude) to your contacts.

::: code-group

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageLocationData;

$data = new MessageLocationData(
    chatId: '123456789@c.us',
    latitude: 38.8937255,
    longitude: -77.0969763,
    title: 'Our office',
);

$response = Message::sendLocation(data: $data);
```

```php [Response]
$response = Message::sendLocation(data: $data);

// Get JSON response
$json = $response->json();
```

:::

## Reply to message

```php
$data = new MessageLocationData(
    chatId: '123456789@c.us',
    latitude: 38.8937255,
    longitude: -77.0969763,
    title: 'Our office',
    reply_to: 'false_1111@c.us_AAA',
);

$response = Message::sendLocation(data: $data);
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ✅ | ✅ | ✅ | ✅ |

## References

- [`MessageLocationData` DTO](/reference/dto/message-location-data.md)
- [WAHA Documentation: Send Location](https://waha.devlike.pro/docs/how-to/send-messages/#send-location)

# Send Location

Send location (latitude and longitude) to your contacts.

## Usage

Send a location message to a specific contact or group.

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

```php [Reply to Message]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageLocationData;

$data = new MessageLocationData(
    chatId: '123456789@c.us',
    latitude: 38.8937255,
    longitude: -77.0969763,
    title: 'Our office',
    replyTo: 'false_1111@c.us_AAA',
);

$response = Message::sendLocation(data: $data);
```

:::

## Response

The `sendLocation` method returns a `Saloon\Http\Response` object. You can use the `json()` method to get the response data or `dtoOrFail()` to transform the response into a DTO (if applicable).

::: code-group

```php [JSON Response]
$response = Message::sendLocation(data: $data);

$json = $response->json();
```

```php [DTO]
$response = Message::sendLocation(data: $data);

$dto = $response->dtoOrFail();
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ✅ | ✅ | ✅ | ✅ |

## References

- [`MessageLocationData` DTO](/reference/dto/message-location-data.md)
- [WAHA Documentation: Send Location](https://waha.devlike.pro/docs/how-to/send-messages/#send-location)

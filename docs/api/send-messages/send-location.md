# Send Location

Send location (latitude and longitude) to your contacts.

## Usage

The `Message` facade's `sendLocation` method may be used to send a location (latitude and longitude) to a contact or group.

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

/** @var \Saloon\Http\Response $response */
$response = Message::sendLocation(data: $data);
```

```php [Reply]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageLocationData;

$data = new MessageLocationData(
    chatId: '123456789@c.us',
    latitude: 38.8937255,
    longitude: -77.0969763,
    title: 'Our office',
    replyTo: 'false_1111@c.us_AAA',
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendLocation(data: $data);
```

:::

## Response

The response returned by the `sendLocation` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 201
$response->json();   // ["id" => "false_123456789@c.us_BAE6A33293978B16", "timestamp" => 1629200000, ...]
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ✔️ | ✔️ | ✔️ | ✔️ |

## References

- [`MessageLocationData` DTO](/reference/dto/message-location-data.md)
- [WAHA Documentation: Send Location](https://waha.devlike.pro/docs/how-to/send-messages/#send-location)

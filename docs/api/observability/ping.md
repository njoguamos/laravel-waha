# Ping

Check if the server is alive.

## Usage

The `Observability` facade's `ping` method may be used to check if the server is alive.

::: code-group

```php [Usage]
use NjoguAmos\Waha\Facades\Observability;

/** @var \Saloon\Http\Response $ping */
$ping = Observability::ping();
```

:::

## Response

The response returned by the `ping` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or the `dtoOrFail` method to retrieve a `PingResponseData` DTO:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $ping */

$ping->status(); // 200
$ping->json();   // ["message" => "pong"]
```

```php [DTO]
use NjoguAmos\Waha\Facades\Observability;

/** @var \NjoguAmos\Waha\Dto\PingResponseData $ping */
$ping = Observability::ping()->dtoOrFail();

$ping->message; // "pong"
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA Observability Documentation](https://waha.devlike.pro/docs/how-to/observability/)
- [PingResponseData DTO Reference](/reference/dto/ping-response-data.md)

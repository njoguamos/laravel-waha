# Get Server Status

Returns the server status, start timestamp, and uptime.

## Usage

The `Observability` facade's `status` method may be used to get the server status.

::: code-group

```php [Usage]
use NjoguAmos\Waha\Facades\Observability;

/** @var \Saloon\Http\Response $response */
$response = Observability::status();
```

:::

## Response

The response returned by the `status` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or the `dtoOrFail` method to retrieve a `ServerStatusData` DTO:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   
/*
{
  "startTimestamp": 1723788847247,
  "uptime": 3600000
}
*/
```

```php [DTO]
use NjoguAmos\Waha\Facades\Observability;

/** @var \NjoguAmos\Waha\Dto\ServerStatusData $status */
$status = Observability::status()->dtoOrFail();

$status->startTimestamp; // \Carbon\CarbonImmutable instance
$status->uptime;         // 3600000
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Observability Documentation](https://waha.devlike.pro/docs/how-to/observability/)
- [ServerStatusData DTO Reference](/reference/dto/server-status-data.md)

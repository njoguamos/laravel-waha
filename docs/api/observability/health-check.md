# Health Check

The health check endpoint is used to determine the health of the service. (WAHA Plus only)

## Usage

The `Observability` facade's `health` method may be used to get the server health check.

::: code-group

```php [Usage]
use NjoguAmos\Waha\Facades\Observability;

/** @var \Saloon\Http\Response $health */
$health = Observability::health();
```

:::

## Response

The response returned by the `health` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or the `dtoOrFail` method to retrieve a `HealthCheckData` DTO:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $health */

$health->status(); // 200
$health->json();   
/*
{
  "status": "ok",
  "info": {
    "mediaFiles.space": {
      "status": "up",
      "path": "/tmp/whatsapp-files",
      "diskPath": "/",
      "free": 132979355648,
      "threshold": 104857600
    },
    "sessionsFiles.space": {
      "status": "up",
      "path": "/app/.sessions",
      "diskPath": "/",
      "free": 132979355648,
      "threshold": 104857600
    }
  },
  "error": {},
  "details": {
    "mediaFiles.space": {
      "status": "up",
      "path": "/tmp/whatsapp-files",
      "diskPath": "/",
      "free": 132979355648,
      "threshold": 104857600
    },
    "sessionsFiles.space": {
      "status": "up",
      "path": "/app/.sessions",
      "diskPath": "/",
      "free": 132979355648,
      "threshold": 104857600
    }
  }
}
*/
```

```php [DTO]
use NjoguAmos\Waha\Facades\Observability;
use NjoguAmos\Waha\Enums\HealthStatus;
use NjoguAmos\Waha\Enums\HealthIndicatorStatus;

/** @var \NjoguAmos\Waha\Dto\HealthCheckData $health */
$health = Observability::health()->dtoOrFail();

$health->status; // \NjoguAmos\Waha\Enums\HealthStatus::OK
$health->info['mediaFiles.space']->status; // \NjoguAmos\Waha\Enums\HealthIndicatorStatus::UP
$health->info['mediaFiles.space']->free;   // 132979355648
```

:::

## Known Errors

### Feature available only in Plus version

If you are using the **WAHA Core** version, the health check endpoint will return a `422 Unprocessable Entity` response. This feature is only available in the **WAHA PLUS** version.

`Saloon\Exceptions\Request\Statuses\UnprocessableEntityException: Unprocessable Entity (422) Response:`

```json
{
    "message": "The feature is available only in Plus version for 'WEBJS' engine. Check this out: https://waha.devlike.pro/",
    "error": "Unprocessable Entity",
    "statusCode": 422
}
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ➕   |  ➕  |   ➕   |  ➕   |

## References

- [WAHA Observability Documentation](https://waha.devlike.pro/docs/how-to/observability/)
- [HealthCheckData DTO Reference](/reference/dto/health-check-data.md)

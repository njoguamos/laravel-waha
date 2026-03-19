# Restart (Stop) Server

Stop or restart the server.

## Usage

The `Observability` facade's `stop` method may be used to stop the server. By default, it gracefully stops all sessions and connections, but you can force it to stop immediately by setting the `force` parameter to `true`.

Docker will automatically restart the server, so you can use this endpoint to reboot the service.

::: code-group

```php [Graceful Stop]
use NjoguAmos\Waha\Facades\Observability;

$response = Observability::stop();
```

```php [Force Stop]
use NjoguAmos\Waha\Facades\Observability;

$response = Observability::stop(force: true);
```

:::

## Response

The response returned by the `stop` method is an instance of `Saloon\Http\Response`.

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Observability Documentation](https://waha.devlike.pro/docs/how-to/observability/)

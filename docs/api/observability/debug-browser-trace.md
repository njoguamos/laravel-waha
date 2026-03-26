# Debug - Get Browser Trace

Get a browser trace (WEBJS engine only). This is useful for debugging browser-related issues, performance, or hangs.

## Prerequisites

To use this feature, you must:

1. Add `WAHA_DEBUG_MODE=True` environment variable to your WAHA server.
2. Restart the WAHA container.

## Usage

The `Observability` facade's `browserTrace` method may be used to get a browser trace. By default, the `browserTrace` method uses the default session from your configuration.

::: code-group

```php [Usage]
use NjoguAmos\Waha\Facades\Observability;

/** @var \Saloon\Http\Response $trace */
$trace = Observability::browserTrace();
```

```php [Custom Options]
use NjoguAmos\Waha\Facades\Observability;

/** @var \Saloon\Http\Response $trace */
$trace = Observability::browserTrace(
    session: 'default',
    seconds: 30,
    categories: '*'
);
```

:::

## Response

The response returned by the `browserTrace` method is an instance of `Saloon\Http\Response`. The body of the response contains the binary content of the browser trace.

You can save this content to a file and open it in Chrome DevTools (`chrome://tracing`) or [trace.cafe](https://trace.cafe/).

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $trace */

$trace->status(); // 200
$trace->body();   // Binary content of the trace
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ✅   |  ✅  |   ❌   |  ❌   |

## References

- [WAHA Observability Documentation](https://waha.devlike.pro/docs/how-to/observability/)

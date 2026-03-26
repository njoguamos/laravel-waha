# Debug - Node Heapsnapshot

Generate a node heapsnapshot for debugging.

## Prerequisites

1. Set `WAHA_DEBUG_MODE=True` environment variable.
2. Restart the container.

## Usage

The `Observability` facade's `heapSnapshot` method may be used to generate a node heapsnapshot.

::: tip
Execute this request only when the issue is happening to collect the most recent information.
:::

::: code-group

```php [Usage]
use NjoguAmos\Waha\Facades\Observability;

/** @var \Saloon\Http\Response $heap */
$heap = Observability::heapSnapshot();
```

:::

## Response

The response returned by the `heapSnapshot` method is an instance of `Saloon\Http\Response`. You can send the resulting file to the developers or open `about://inspect` in Chrome to analyze the heap.

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $heap */

$heap->status(); // 200
$heap->body();   // Binary content of the heapsnapshot
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA Observability Documentation](https://waha.devlike.pro/docs/how-to/observability/)

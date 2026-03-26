# Debug - Node CPU Profiling

Generate a node CPU profile for debugging.

## Prerequisites

To use this feature, you must:

1. Add `WAHA_DEBUG_MODE=True` environment variable to your WAHA container.
2. Restart the container.

## Usage

The `Observability` facade's `cpuProfile` method may be used to generate a node CPU profile. The method accepts an optional `seconds` parameter (default is 30) to specify the duration of the profiling.

::: code-group

```php [Usage]
use NjoguAmos\Waha\Facades\Observability;

/** @var \Saloon\Http\Response $response */
$response = Observability::cpuProfile(seconds: 30);

// Save the profile to a file
file_put_contents('cpu.cpuprofile', $response->body());
```

:::

## Response

The response returned by the `cpuProfile` method is an instance of `Saloon\Http\Response`. The body of the response contains the CPU profile data.

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->body();   // Binary content of the CPU profile
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA Observability Documentation](https://waha.devlike.pro/docs/how-to/observability/)

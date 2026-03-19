# Get Server Version

Returns the version of the installed docker image.

## Usage

The `Observability` facade's `version` method may be used to get the server version.

::: code-group

```php [Usage]
use NjoguAmos\Waha\Facades\Observability;

/** @var \Saloon\Http\Response $observability */
$observability = Observability::version();
```

:::

## Response

The response returned by the `version` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or the `dtoOrFail` method to retrieve a `ServerVersionData` DTO:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $observability */

$observability->status(); // 200
$observability->json();   
/*
{
  "version": "2024.2.3",
  "engine": "NOWEB",
  "tier": "PLUS",
  "browser": "/usr/bin/google-chrome-stable"
}
*/
```

```php [DTO]
use NjoguAmos\Waha\Facades\Observability;

/** @var \NjoguAmos\Waha\Dto\ServerVersionData $observability */
$observability = Observability::version()->dtoOrFail();

$observability->version; // "2024.2.3"
$observability->engine;  // \NjoguAmos\Waha\Enums\Engine::NOWEB
$observability->tier;    // \NjoguAmos\Waha\Enums\Version::PRO
$observability->browser; // "/usr/bin/google-chrome-stable"

$observability->engine->value; // "NOWEB"
$observability->tier->value;   // "PLUS"
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Observability Documentation](https://waha.devlike.pro/docs/how-to/observability/)
- [ServerVersionData DTO Reference](/reference/dto/server-version-data.md)

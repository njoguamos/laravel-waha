# Get Server Environment Variables

Returns the environment variables of the server.

## Usage

The `Observability` facade's `environment` method may be used to retrieve the environment variables of the server. By default, the `environment` method returns only WAHA-related variables. You can set the `all` parameter to `true` to get all environment variables (same one you gent when you run `printenv` linux command).

::: code-group

```php [WAHA Variables]
use NjoguAmos\Waha\Facades\Observability;

$env = Observability::environment();
```

```php [All Variables]
use NjoguAmos\Waha\Facades\Observability;

$env = Observability::environment(all: true);
```

:::

## Response

The response returned by the `environment` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $env */

$env->status(); // 200
$env->json();
/*
{
  "WAHA_API_KEY": "sha512:3a27...ca0261c7f75a5",
  "WAHA_CLIENT_BROWSER_NAME": "Chrome",
  "WAHA_DASHBOARD_ENABLED" => "true",
  "WAHA_DASHBOARD_NO_PASSWORD" => "False"
  "WAHA_GOWS_PATH" => "/app/gows"
  "WAHA_GOWS_SOCKET" => "/tmp/gows.sock"
  ...
}
*/
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA Observability Documentation](https://waha.devlike.pro/docs/how-to/observability/)

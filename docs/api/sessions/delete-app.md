# Delete App

Deletes an application (like `calls`) for the given session.

## Usage

The `Session` facade's `deleteApp` method may be used to delete an app.

::: code-group

```php [Usage]
use NjoguAmos\Waha\Facades\Session;

/** @var \Saloon\Http\Response $response */
$response = Session::deleteApp(id: 'calls');
```

:::

## Response

The response returned by the `deleteApp` method is an instance of `Saloon\Http\Response`. You may use the `status` method to check the status code:

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

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)

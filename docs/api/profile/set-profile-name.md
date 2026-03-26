# Set Profile Name

Set your WhatsApp profile name.

## Usage

::: code-group

```php [Default Session]
use NjoguAmos\Waha\Facades\Profile;

/** @var \Saloon\Http\Response $response */
$response = Profile::setName(name: 'My New Name');
```

```php [Specific Session]
use NjoguAmos\Waha\Facades\Profile;

/** @var \Saloon\Http\Response $response */
$response = Profile::setName(name: 'My New Name', session: 'my-session');
```

:::

## Parameters

| Parameter | Type     | Required | Description           |
|-----------|----------|----------|-----------------------|
| `name`    | `string` | Yes      | The new profile name  |
| `session` | `string` | No       | Session name (defaults to `waha.session` config) |

## Response

The response returned by the `setName` method is an instance of `Saloon\Http\Response`:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   // ["success" => true]
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA Profile Documentation](https://waha.devlike.pro/docs/how-to/profile/)

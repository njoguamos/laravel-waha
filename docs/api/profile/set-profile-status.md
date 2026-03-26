# Set Profile Status

Set your WhatsApp profile status (About).

## Usage

::: code-group

```php [Default Session]
use NjoguAmos\Waha\Facades\Profile;

/** @var \Saloon\Http\Response $response */
$response = Profile::setStatus(status: 'Hey there! I am using WhatsApp.');
```

```php [Specific Session]
use NjoguAmos\Waha\Facades\Profile;

/** @var \Saloon\Http\Response $response */
$response = Profile::setStatus(status: 'Available', session: 'my-session');
```

:::

## Parameters

| Parameter | Type     | Required | Description                     |
|-----------|----------|----------|---------------------------------|
| `status`  | `string` | Yes      | The new profile status (About)  |
| `session` | `string` | No       | Session name (defaults to `waha.session` config) |

## Response

The response returned by the `setStatus` method is an instance of `Saloon\Http\Response`:

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

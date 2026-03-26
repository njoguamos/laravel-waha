# Set Profile Picture

Set your WhatsApp profile picture.

## Usage

::: code-group

```php [URL]
use NjoguAmos\Waha\Facades\Profile;

/** @var \Saloon\Http\Response $response */
$response = Profile::setPicture(file: 'https://example.com/photo.jpg');
```

```php [Base64]
use NjoguAmos\Waha\Facades\Profile;

/** @var \Saloon\Http\Response $response */
$response = Profile::setPicture(file: 'data:image/jpeg;base64,/9j/4AAQSkZJRg==');
```

```php [Custom Session]
use NjoguAmos\Waha\Facades\Profile;

/** @var \Saloon\Http\Response $response */
$response = Profile::setPicture(file: 'https://example.com/photo.jpg', session: 'my-session');
```

:::

## Parameters

| Parameter | Type     | Required | Description                                                        |
|-----------|----------|----------|--------------------------------------------------------------------|
| `file`    | `string` | Yes      | The image file. Can be a URL or base64 encoded data with data URI. |
| `session` | `string` | No       | Session name (defaults to `waha.session` config)                   |

## Response

The response returned by the `setPicture` method is an instance of `Saloon\Http\Response`:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   // ["success" => true]
```

:::

## Known Errors

### Using on WAHA Core version

Set Profile Picture requires the **WAHA PLUS** version. If you are using the **WAHA Core** version, the package will throw a `RuntimeException` before making the API request:

`RuntimeException: Set Profile Picture is not supported on CORE version. Upgrade to PLUS.`

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ➕   |  ✅  |   ➕   |  ➕   |

> ➕ = PLUS version only

## References

- [WAHA Profile Documentation](https://waha.devlike.pro/docs/how-to/profile/)

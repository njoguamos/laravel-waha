# Delete Profile Picture

Delete your WhatsApp profile picture.

## Usage

::: code-group

```php [Default Session]
use NjoguAmos\Waha\Facades\Profile;

/** @var \Saloon\Http\Response $response */
$response = Profile::deletePicture();
```

```php [Specific Session]
use NjoguAmos\Waha\Facades\Profile;

/** @var \Saloon\Http\Response $response */
$response = Profile::deletePicture(session: 'my-session');
```

:::

## Response

The response returned by the `deletePicture` method is an instance of `Saloon\Http\Response`:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   // ["success" => true]
```

:::

## Known Errors

### Using on WAHA Core version

Delete Profile Picture requires the **WAHA PLUS** version. If you are using the **WAHA Core** version, the package will throw a `RuntimeException` before making the API request:

`RuntimeException: Delete Profile Picture is not supported on CORE version. Upgrade to PLUS.`

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ➕   |  ✅  |   ➕   |  ➕   |

> ➕ = PLUS version only

## References

- [WAHA Profile Documentation](https://waha.devlike.pro/docs/how-to/profile/)

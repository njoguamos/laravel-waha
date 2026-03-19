# Get Screenshot

Retrieve a screenshot of a Session.

## Usage

The `Session` facade's `screenshot` method may be used to retrieve a screenshot of a Session (usually for QR code or current state). By default, it retrieves a screenshot of the default session. You can also specify a session name to retrieve a screenshot of a specific session.

::: code-group

```php [Default Session]
use NjoguAmos\Waha\Facades\Session;

/** @var \Saloon\Http\Response $session */
$session = Session::screenshot();
```

```php [Specific Session]
use NjoguAmos\Waha\Facades\Session;

/** @var \Saloon\Http\Response $session */
$session = Session::screenshot(session: 'custom-session');
```

:::

## Response

The response returned by the `screenshot` method is an instance of `Saloon\Http\Response`. The body is a PNG image or a JSON object depending on the engine:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $session */

$session->status(); // 200
$session->json();   // ["mimetype" => "image/png", "data" => "base64-encoded-data"]
```

```php [DTO]
/** @var \NjoguAmos\Waha\Dto\ScreenshotData $screenshot */
$screenshot = $session->dtoOrFail();

$screenshot->mimetype; // "image/png"
$screenshot->data;     // "base64-encoded-data"
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|  ✅     |  ✅️  | ➖ | ➖ |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)
- [Screenshot Data DTO](/reference/dto/screenshot-data.md)

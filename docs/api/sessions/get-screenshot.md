# Get Screenshot

Retrieve a screenshot of the session.

## Usage

The `Session` facade's `screenshot` method may be used to retrieve a screenshot of the session (usually for QR code or current state). By default, it retrieves a screenshot of the default session. You can also specify a session name to retrieve a screenshot of a specific session.

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

The response returned by the `screenshot` method is an instance of `Saloon\Http\Response`. The body is a PNG image:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $session */

$session->status(); // 200
$session->body();   // PNG image binary data
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|  ✅     |  ✅️  | ➖ | ➖ |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)

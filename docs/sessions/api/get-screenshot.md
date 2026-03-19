# Get Screenshot

Get a screenshot of the session (usually for QR code or current state).
Returns an instance of `Saloon\Http\Response`.

## Usage

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::screenshot();
```

### Get Screenshot of Custom Session

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::screenshot(session: 'custom-session');
```

## Result

The response is an instance of `Saloon\Http\Response`.
The body is a PNG image.

```php
$result->status(); // 200
$result->body();   // PNG image binary data
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|  ✅     |  ✅️  | ➖ | ➖ |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)

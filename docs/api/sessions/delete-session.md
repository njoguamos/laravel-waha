# Delete Session

Delete the session with the given name. Stop and logout as well. Idempotent operation.

## Usage

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::delete();
```

### Delete Custom Session

```php
$result = Session::delete(session: 'custom-session');
```

## Result

The response is an instance of `Saloon\Http\Response`.

```php
$result->status(); // 201
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)

# Get Session

Returns information about a specific session.

## Usage

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::get();
```

### Get Specific Session

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::get(session: 'custom-session');
```

## Result

The response is an instance of `Saloon\Http\Response`.

```php
$result->status(); // 200
$result->json();   // ["name" => "default", "status" => "ONLINE", ...]
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)

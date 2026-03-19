# Restart Session

Restart a session.

**Force Restart**
If the session is already running (status is not STOPPED), it’ll be stopped and started.

## Usage

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::restart();
```

### Restart Custom Session

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::restart(session: 'custom-session');
```

## Result

The response is an instance of `Saloon\Http\Response`.

```php
$result->status(); // 200
$result->json();   // ["message" => "Restarted session default", "status" => 200]
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)

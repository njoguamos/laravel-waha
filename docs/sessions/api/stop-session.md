# Stop Session

Stopping a session does not log out or delete anything.

::: tip Idempotent operation
You can call it multiple times, and it’ll stop the session only if it’s running.
:::

## Usage

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::stop();
```

### Stop Custom Session

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::stop(session: 'custom-session');
```

## Result

The response is an instance of `Saloon\Http\Response`.

```php
$result->status(); // 200
$result->json();   // ["message" => "Stopped session default", "status" => 200]
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)

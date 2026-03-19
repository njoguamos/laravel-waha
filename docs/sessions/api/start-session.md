# Start Session

Start a session.

**Idempotent Operation**
If you're trying to start an already running session, it'll return its current state and won't do anything else.

## Usage

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::start();
```

### Start Custom Session

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::start(session: 'custom-session');
```

## Result

The response is an instance of `Saloon\Http\Response`.

```php
$result->status(); // 201
$result->json();   // ["name" => "default", "status" => "STARTING", ...]
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)

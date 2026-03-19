# Logout Session

Logout from a session (unpair a device). Log out removes session information (authentication info and data), but keeps the session’s configuration, so you can start a new session with the same configuration.

**Force Logout**
- If the session is running (not in STOPPED status), it’ll be logged out and started from scratch.
- If the session is in WORKING status, it’ll also remove an associated device from the Connected Devices list in the app.

## Usage

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::logout();
```

### Logout Custom Session

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::logout(session: 'custom-session');
```

## Result

The response is an instance of `Saloon\Http\Response`.

```php
$result->status(); // 200
$result->json();   // ["message" => "Logged out from session default", "status" => 200]
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)
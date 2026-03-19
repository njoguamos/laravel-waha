# Logout Session

Logout from a WhatsApp session.

## Usage

The `Session` facade's `logout` method may be used to logout from a session (unpair a device). Log out removes session information (authentication info and data), but keeps the session’s configuration, so you can start a new session with the same configuration.

By default, the `logout` method logs out from the default session. You can also specify a session name to logout from a specific session.

::: code-group

```php [Default Session]
use NjoguAmos\Waha\Facades\Session;

/** @var \Saloon\Http\Response $session */
$session = Session::logout();
```

```php [Specific Session]
use NjoguAmos\Waha\Facades\Session;

/** @var \Saloon\Http\Response $session */
$session = Session::logout(session: 'custom-session');
```

:::

::: info
If the session is running (not in STOPPED status), it’ll be logged out and started from scratch.

If the session is in WORKING status, it’ll also remove an associated device from the Connected Devices list in the app.
:::

## Response

The response returned by the `logout` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $session */

$session->status(); // 200
$session->json();   // ["message" => "Logged out from session default", "status" => 200]
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)
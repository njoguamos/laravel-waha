# Restart Session

Restart a WhatsApp session.

## Usage

The `Session` facade's `restart` method may be used to restart a WhatsApp session. By default, it restarts the default session. You can also specify a session name to restart a specific session.

::: code-group

```php [Default Session]
use NjoguAmos\Waha\Facades\Session;

/** @var \Saloon\Http\Response $session */
$session = Session::restart();
```

```php [Specific Session]
use NjoguAmos\Waha\Facades\Session;

/** @var \Saloon\Http\Response $session */
$session = Session::restart(session: 'custom-session');
```

:::

## Force Restart

If the session is already running (status is not STOPPED), it’ll be stopped and started.

## Response

The response returned by the `restart` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $session */

$session->status(); // 200
$session->json();   // ["message" => "Restarted session default", "status" => 200]
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)

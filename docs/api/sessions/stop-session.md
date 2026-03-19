# Stop Session

Stop a WhatsApp session.

## Usage

The `Session` facade's `stop` method may be used to stop a WhatsApp session. Stopping a session does not log out or delete anything.

By default, the `stop` method stops the default session. You can also specify a session name to stop a specific session.

::: code-group

```php [Default Session]
use NjoguAmos\Waha\Facades\Session;

/** @var \Saloon\Http\Response $session */
$session = Session::stop();
```

```php [Specific Session]
use NjoguAmos\Waha\Facades\Session;

/** @var \Saloon\Http\Response $session */
$session = Session::stop(session: 'custom-session');
```

:::

::: info
You can call it multiple times, and it’ll stop the session only if it’s running.
:::

## Response

The response returned by the `stop` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $session */

$session->status(); // 200
$session->json();   // ["message" => "Stopped session default", "status" => 200]
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)

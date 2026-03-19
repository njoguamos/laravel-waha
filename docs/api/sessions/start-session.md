# Start Session

Start a WhatsApp session.

## Usage

The `Session` facade's `start` method may be used to start a WhatsApp session. By default, it starts the default session. You can also specify a session name to start a specific session.

::: code-group

```php [Default Session]
use NjoguAmos\Waha\Facades\Session;

/** @var \Saloon\Http\Response $session */
$session = Session::start();
```

```php [Specific Session]
use NjoguAmos\Waha\Facades\Session;

/** @var \Saloon\Http\Response $session */
$session = Session::start(session: 'custom-session');
```

:::

::: info
If you're trying to start an already running session, it'll return its current state and won't do anything else.
:::

## Response

The response returned by the `start` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $session */

$session->status(); // 201
$session->json();   // ["name" => "default", "status" => "STARTING", ...]
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)

# Delete Session

Delete a WhatsApp session.

## Usage

The `Session` facade's `delete` method may be used to delete a WhatsApp session. By default, it deletes the default session. You can also specify a session name to delete a specific session.

::: code-group

```php [Default Session]
use NjoguAmos\Waha\Facades\Session;

/** @var \Saloon\Http\Response $session */
$session = Session::delete();
```

```php [Specific Session]
use NjoguAmos\Waha\Facades\Session;

/** @var \Saloon\Http\Response $session */
$session = Session::delete(session: 'custom-session');
```

:::

## Response

The response returned by the `delete` method is an instance of `Saloon\Http\Response`. You may use the `status` method to check the response status:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $session */

$session->status(); // 201
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)

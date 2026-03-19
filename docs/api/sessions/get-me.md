# Get Me

Retrieve information about the authenticated account.

## Usage

The `Session` facade's `me` method may be used to retrieve information about the authenticated account. By default, it retrieves information about the default session. You can also specify a session name to retrieve information about a specific session.

:::: code-group

```php [Default Session]
use NjoguAmos\Waha\Facades\Session;

/** @var \Saloon\Http\Response $session */
$session = Session::me();
```

```php [Specific Session]
use NjoguAmos\Waha\Facades\Session;

/** @var \Saloon\Http\Response $session */
$session = Session::me(session: 'custom-session');
```

::::

## Response

The response returned by the `me` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or the `dtoOrFail` method to retrieve a `SessionMeData` DTO:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $session */

$session->status(); // 200
$session->json();   // ["id" => "123456789@c.us", "pushName" => "John", ...]
```

```php [DTO]
use NjoguAmos\Waha\Facades\Session;

/** @var \NjoguAmos\Waha\Dto\SessionMeData $me */
$me = Session::me()->dtoOrFail();
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)
- [SessionMeData DTO Reference](/reference/dto/session-me-data.md)

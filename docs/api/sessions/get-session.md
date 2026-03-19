# Get Session

Retrieve information about a WhatsApp session.

## Usage

The `Session` facade's `get` method may be used to retrieve information about a specific WhatsApp session. By default, it returns information about the default session. You can also specify a session name to retrieve information about a specific session.

::: code-group

```php [Default Session]
use NjoguAmos\Waha\Facades\Session;

/** @var \Saloon\Http\Response $session */
$session = Session::get();
```

```php [Specific Session]
use NjoguAmos\Waha\Facades\Session;

/** @var \Saloon\Http\Response $session */
$session = Session::get(session: 'custom-session');
```

:::

## Response

The response returned by the `get` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or the `dtoOrFail` method to retrieve a `SessionData` DTO:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $session */

$session->status(); // 200
$session->json();   // ["name" => "default", "status" => "WORKING", ...]
```

```php [DTO]
use NjoguAmos\Waha\Enums\SessionStatus;
use NjoguAmos\Waha\Facades\Session;

/** @var \NjoguAmos\Waha\Dto\SessionData $session */
$session = Session::get()->dtoOrFail();

$session->name; // "default"
$session->status; // SessionStatus::WORKING
```

:::

## Known Errors

### Trying to access a session other than `default` on WAHA Core

If you are using the **WAHA Core** version and attempt to access a session other than `default`, the API will return a `422 Unprocessable Entity` response. This is because WAHA Core only supports a single session.

`Saloon\Exceptions\Request\Statuses\UnprocessableEntityException: Unprocessable Entity (422) Response:` 

```json
{ 
    "message":"WAHA Core support only 'default' session. You tried to access 'fd' session (base64: ZmQ=). If you want to run more then one WhatsApp account ...",
    "error":"Unprocessable Entity",
    "statusCode":422 
}
```

To run more than one WhatsApp account, you will need the **WAHA PLUS** version.


## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)
- [SessionData DTO Reference](/reference/dto/session-data.md)

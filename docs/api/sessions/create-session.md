# Create Session

Create a new session.

## Usage

Create a new session (and start it at the same time if required).

```php
use NjoguAmos\Waha\Facades\Session;
use NjoguAmos\Waha\Dto\SessionCreateData;

$data = new SessionCreateData(
    name: 'default',
    start: true,
);

$session = Session::create(data: $data);
```

## Response

The response returned by the `create` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or the `dtoOrFail` method to retrieve a `SessionData` DTO:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $session */

$session->status(); // 201
$session->json();   // ["name" => "default", "status" => "STARTING", ...]
```

```php [DTO]
use NjoguAmos\Waha\Facades\Session;

/** @var \NjoguAmos\Waha\Dto\SessionData $session */
$session = $session->dtoOrFail();
```

:::

## Known Errors

### Creating a session other than `default` on WAHA Core

If you are using the **WAHA Core** version and attempt to create a session other than `default`, the API will return a `422 Unprocessable Entity` response. This is because WAHA Core only supports a single session.

```php
Saloon\Exceptions\Request\Statuses\UnprocessableEntityException: Unprocessable Entity (422) Response: 
{
    "message":"WAHA Core support only 'default' session. You tried to access 'another' session (base64: YW5vdGhlcg==). If you want to run more then one WhatsApp account...",
    "error":"Unprocessable Entity",
    "statusCode":422
}
```

To run more than one WhatsApp account, you will need the **WAHA PLUS** version.

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)
- [SessionCreateData DTO Reference](/reference/dto/session-create-data.md)
- [SessionData DTO Reference](/reference/dto/session-data.md)

# List Sessions

Retrieve all WhatsApp sessions running on the server.

## Usage

The `Session` facade's `all` method may be used to retrieve all WhatsApp sessions running on the server. By default, the `all` method returns all sessions, including stopped ones. You can set the `all` parameter to `false` to get only active sessions.

::: code-group

```php [All Sessions]
use NjoguAmos\Waha\Facades\Session;

$sessions = Session::all();
```

```php [Active Sessions Only]
use NjoguAmos\Waha\Facades\Session;

$sessions = Session::all(all: false);
```

:::

## Response

The response returned by the `all` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or the `dtoOrFail` method to retrieve a collection of `SessionData` DTOs:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $sessions */

$sessions->status(); // 200
$sessions->json();   // [["name" => "default", "status" => "WORKING", ...]]
```

```php [DTO Collection]
use NjoguAmos\Waha\Enums\SessionStatus;
use NjoguAmos\Waha\Facades\Session;

/** @var array<\NjoguAmos\Waha\Dto\SessionData> $sessions */
$sessions = Session::all()->dtoOrFail();

$sessions[0]->name; // "default"
$sessions[0]->status; // SessionStatus::WORKING
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)
- [SessionData DTO Reference](/reference/dto/session-data.md)

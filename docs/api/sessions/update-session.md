# Update Session

Update the configuration of a WhatsApp session.

## Usage

The `Session` facade's `update` method may be used to update session configuration. By default, it updates the default session. You can also specify a session name to update a specific session.

::: code-group

```php [Default Session]
use NjoguAmos\Waha\Facades\Session;
use NjoguAmos\Waha\Dto\SessionUpdateData;

$data = new SessionUpdateData(
    apps: [['app' => 'calls', 'enabled' => true]],
);

/** @var \Saloon\Http\Response $session */
$session = Session::update(data: $data);
```

```php [Specific Session]
use NjoguAmos\Waha\Facades\Session;
use NjoguAmos\Waha\Dto\SessionUpdateData;

$data = new SessionUpdateData(
    apps: [['app' => 'calls', 'enabled' => true]],
);

/** @var \Saloon\Http\Response $session */
$session = Session::update(data: $data, session: 'custom-session');
```

:::

## Response

The response returned by the `update` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or the `dtoOrFail` method to retrieve a `SessionData` DTO:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $session */

$session->status(); // 201
$session->json();   // ["name" => "default", "status" => "WORKING", ...]
```

```php [DTO]
use NjoguAmos\Waha\Facades\Session;

/** @var \NjoguAmos\Waha\Dto\SessionData $session */
$session = $session->dtoOrFail();
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)
- [SessionUpdateData DTO Reference](/reference/dto/session-update-data.md)
- [SessionData DTO Reference](/reference/dto/session-data.md)

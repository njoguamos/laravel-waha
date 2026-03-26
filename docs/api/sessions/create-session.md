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

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|   ✅   |  ✅   |   ✅   |  ✅   |
|:-----:|:----:|:-----:|:----:|

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)
- [SessionCreateData DTO Reference](/reference/dto/session-create-data.md)
- [SessionData DTO Reference](/reference/dto/session-data.md)

# Create Session

Create a new session (and start it at the same time if required).

## Usage

```php
use NjoguAmos\Waha\Facades\Session;
use NjoguAmos\Waha\Dto\SessionCreateData;

$data = new SessionCreateData(
    name: 'default',
    start: true,
);

$result = Session::create(data: $data);
```

### Result

The response is an instance of `Saloon\Http\Response`.

```php
$result->status(); // 201
$result->json();   // ["name" => "default", "status" => "STARTING", ...]
```

You can also get the result as a `SessionData` DTO.

```php
$session = $result->dtoOrFail(); // NjoguAmos\Waha\Dto\SessionData
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [`SessionCreateData` DTO](../../reference/dto/session-create-data.md)
- [`SessionData` DTO](../../reference/dto/session-data.md)
- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)

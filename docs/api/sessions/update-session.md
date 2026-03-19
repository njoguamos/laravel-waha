# Update Session

Update session configuration.

## Usage

```php
use NjoguAmos\Waha\Facades\Session;
use NjoguAmos\Waha\Dto\SessionUpdateData;

$data = new SessionUpdateData(
    apps: [['app' => 'calls', 'enabled' => true]],
);

$result = Session::update(data: $data);
```

### Update Custom Session

```php
$result = Session::update(data: $data, session: 'custom-session');
```

## Result

The response is an instance of `Saloon\Http\Response`.

```php
$result->status(); // 201
$result->json();   // ["name" => "default", "status" => "WORKING", ...]
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

- [`SessionUpdateData` DTO](../../reference/dto/session-update-data.md)
- [`SessionData` DTO](../../reference/dto/session-data.md)
- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)

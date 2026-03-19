# Get Me

Get information about the authenticated account.

## Usage

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::me();
```

### Result

The response is an instance of `Saloon\Http\Response`.

```php
$result->status(); // 201
$result->json();   // ["id" => "123456789@c.us", "pushName" => "John", ...]
```

You can also get the result as a `SessionMeData` DTO.

```php
$me = $result->dtoOrFail(); // NjoguAmos\Waha\Dto\SessionMeData
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [`SessionMeData` DTO](../../reference/dto/session-me-data.md)
- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)

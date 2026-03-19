# Get Session

Returns information about a specific session.

## Usage

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::get();
```

### Get Specific Session

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::get(session: 'custom-session');
```

## Result

The response is an instance of `Saloon\Http\Response`.

```php
$result->status(); // 200
$result->json();   // ["name" => "default", "status" => "WORKING", ...]
```

### DTO

```php
use NjoguAmos\Waha\Enums\SessionStatus;
use NjoguAmos\Waha\Facades\Session;

$session = Session::get()->dtoOrFail();

$session->name; // "default"
$session->status; // SessionStatus::WORKING
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)
- [SessionData DTO Reference](../../reference/dto/session-data)

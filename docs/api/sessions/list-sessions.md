# List Sessions

List all sessions.

**Filter Active Sessions**
By default, the `all` parameter is set to `true` to return all sessions. You can set it to `false` to only list active sessions.

## Usage

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::all();
```

### List Active Sessions

```php
use NjoguAmos\Waha\Facades\Session;

$result = Session::all(all: false);
```

## Result

The response is an instance of `Saloon\Http\Response`.

```php
$result->status(); // 200
$result->json();   // [["name" => "default", "status" => "WORKING", ...]]
```

### DTO

```php
use NjoguAmos\Waha\Enums\SessionStatus;
use NjoguAmos\Waha\Facades\Session;

$sessions = Session::all()->dtoOrFail();

$sessions[0]->name; // "default"
$sessions[0]->status; // SessionStatus::WORKING
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)
- [SessionData DTO Reference](../../reference/dto/session-data.md)

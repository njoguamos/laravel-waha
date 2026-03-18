# List Sessions

List all sessions.

::: tip Filter Active Sessions
By default, the `all` parameter is set to `true` to return all sessions. You can set it to `false` to only list active sessions.
:::

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
$result->json();   // [["name" => "default", "status" => "ONLINE", ...]]
```

### DTO

You can also get the result as an array of `SessionData` DTOs.

```php
$sessions = Session::all()->dtoOrFail();

$sessions[0]->name; // "default"
$sessions[0]->status; // "WORKING"
```

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:----:|:-----:|:----:|
|   ✅   |  ✅   |   ✅   |  ✅   |

## References

- [WAHA Sessions Documentation](https://waha.devlike.pro/docs/how-to/sessions/)
- [SessionData DTO Reference](../../reference/dto/session-data)

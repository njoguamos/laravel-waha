# List Apps

`GET /api/apps`

List all apps associated with a specific session.

## Usage

```php
use NjoguAmos\Waha\Facades\App;

$response = App::all(session: 'default');
```

## Response

The response is a `Saloon\Http\Response` containing a list of app configurations.

::: code-group
```json [Saloon Response]
[
  {
    "id": "app_123",
    "session": "default",
    "app": "chatwoot",
    "enabled": true,
    "config": {
      "url": "https://chatwoot.example.com",
      "accountId": 1,
      "accountToken": "token",
      "inboxId": 1,
      "inboxIdentifier": "identifier",
      "locale": "en-US"
    }
  }
]
```
:::

## References

- [WAHA Apps Documentation](https://waha.devmonkeys.org/docs/apps/)
- [App Data DTO](/reference/dto/app-data)
- [App Type Enum](/reference/enums/app-type)

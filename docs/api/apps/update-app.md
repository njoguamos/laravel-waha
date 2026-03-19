# Update App

`PUT /api/apps/{appId}`

Update an existing app configuration.

## Usage

```php
use NjoguAmos\Waha\Facades\App;
use NjoguAmos\Waha\Dto\AppData;
use NjoguAmos\Waha\Enums\AppType;

$appData = new AppData(
    session: 'default',
    app: AppType::CHATWOOT,
    enabled: false,
    config: [
        'url' => 'https://chatwoot.example.com',
        'accountId' => 1,
        'accountToken' => 'new-token',
        'inboxId' => 1,
        'inboxIdentifier' => 'identifier',
        'locale' => 'en-US',
    ]
);

$response = App::update(id: 'app_123', data: $appData);
```

## Response

The response is a `Saloon\Http\Response` containing the updated app configuration.

::: code-group
```json [Saloon Response]
{
  "id": "app_123",
  "session": "default",
  "app": "chatwoot",
  "enabled": false,
  "config": {
    "url": "https://chatwoot.example.com",
    "accountId": 1,
    "accountToken": "new-token",
    "inboxId": 1,
    "inboxIdentifier": "identifier",
    "locale": "en-US"
  }
}
```
:::

## References

- [WAHA Apps Documentation](https://waha.devmonkeys.org/docs/apps/)
- [App Data DTO](/reference/dto/app-data)
- [App Type Enum](/reference/enums/app-type)

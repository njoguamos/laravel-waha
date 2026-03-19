# App Data

`NjoguAmos\Waha\Dto\AppData`

The `AppData` DTO is used to represent an application configuration for a session.

## Properties

| Property  | Type    | Description                                      |
|-----------|---------|--------------------------------------------------|
| `session` | `string`| The name of the session the app belongs to.     |
| `app`     | `AppType`| The type of the app.                            |
| `enabled` | `bool`  | Whether the app is enabled. Default: `true`.    |
| `id`      | `string?`| Optional unique identifier for the app.         |
| `config`  | `array` | Configuration specific to the app type.          |

## App Configurations

### ChatWoot

For `AppType::CHATWOOT`, the `config` should include:

| Property          | Type     | Description                                |
|-------------------|----------|--------------------------------------------|
| `url`             | `string` | ChatWoot URL.                              |
| `accountId`       | `number` | ChatWoot Account ID.                       |
| `accountToken`    | `string` | ChatWoot Account Token.                    |
| `inboxId`         | `number` | ChatWoot Inbox ID.                         |
| `inboxIdentifier` | `string` | ChatWoot Inbox Identifier.                 |
| `locale`          | `string` | Locale (e.g., `en-US`).                    |

### Calls

For `AppType::CALLS`, the `config` should include:

| Property | Type    | Description                                |
|----------|---------|--------------------------------------------|
| `dm`     | `object`| Rules for direct messages (non-group calls).|
| `group`  | `object`| Rules for group calls.                     |

Each rule object should have:

| Property | Type   | Description                      |
|----------|--------|----------------------------------|
| `reject` | `bool` | Whether to reject calls.         |

## Usage

```php
use NjoguAmos\Waha\Dto\AppData;
use NjoguAmos\Waha\Enums\AppType;

$appData = new AppData(
    session: 'default',
    app: AppType::CHATWOOT,
    enabled: true,
    config: [
        'url' => 'https://chatwoot.example.com',
        'accountId' => 1,
        'accountToken' => 'token',
        'inboxId' => 1,
        'inboxIdentifier' => 'identifier',
        'locale' => 'en-US',
    ]
);
```

## References

- [WAHA Apps Documentation](https://waha.devmonkeys.org/docs/apps/)
- [App Type Enum](/reference/enums/app-type)

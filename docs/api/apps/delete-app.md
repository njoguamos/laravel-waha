# Delete App

`DELETE /api/apps/{appId}`

Delete an existing app configuration.

## Usage

```php
use NjoguAmos\Waha\Facades\App;

$response = App::delete(id: 'app_123');
```

## Response

The response is a `Saloon\Http\Response`.

::: code-group
```json [Saloon Response]
{
  "message": "App deleted successfully"
}
```
:::

## References

- [WAHA Apps Documentation](https://waha.devmonkeys.org/docs/apps/)
- [App Data DTO](/reference/dto/app-data)
- [App Type Enum](/reference/enums/app-type)

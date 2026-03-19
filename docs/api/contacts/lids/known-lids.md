# Get Known LIDs

Query all known LID-to-phone number mappings for a session.

::: tip
Call Get all groups or Refresh groups to populate lid to phone number mapping for all groups.
:::

## Usage

You can use the `Contact` facade to query all known LIDs.

::: code-group

```php [Usage]
use NjoguAmos\Waha\Facades\Contact;

/** @var \Saloon\Http\Response $response */
$response = Contact::getAllLids(limit: 100, offset: 0);
```

:::

## Response

The response returned by the `getAllLids` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or the `dtoOrFail` method to retrieve an array of `LidData` DTOs:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   // [["lid" => "123123123@lid", "pn" => "123456789@c.us"]]
```

```php [DTO]
use NjoguAmos\Waha\Facades\Contact;

/** @var \NjoguAmos\Waha\Dto\LidData[] $dtos */
$dtos = Contact::getAllLids()->dtoOrFail();

foreach ($dtos as $dto) {
    $dto->lid; // "123123123@lid"
    $dto->pn;  // "123456789@c.us"
}
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
| :---: | :-: | :---: | :--: |
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA API - Get Known LIDs](https://waha.devlike.pro/docs/how-to/contacts/#get-known-lids)
- [`LidData` DTO](/reference/dto/lid-data.md)

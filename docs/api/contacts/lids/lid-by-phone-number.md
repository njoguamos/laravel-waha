# Get LID by Phone Number

Fetch the LID for a given phone number (chat ID).

## Usage

You can use the `Contact` facade to fetch the LID for a given phone number.

::: code-group

```php [Usage]
use NjoguAmos\Waha\Facades\Contact;

/** @var \Saloon\Http\Response $response */
$response = Contact::getLid(phone: '123456789@c.us');
```

:::

## Response

The response returned by the `getLid` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or the `dtoOrFail` method to retrieve a `LidData` DTO:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   // ["lid" => "123123123@lid", "pn" => "123456789@c.us"]
```

```php [DTO]
use NjoguAmos\Waha\Facades\Contact;

/** @var \NjoguAmos\Waha\Dto\LidData $dto */
$dto = Contact::getLid(phone: '123456789@c.us')->dtoOrFail();

$dto->lid; // "123123123@lid"
$dto->pn;  // "123456789@c.us"
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
| :---: | :-: | :---: | :--: |
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA API - Get LID by Phone Number](https://waha.devlike.pro/docs/how-to/contacts/#get-lid-by-phone-number)
- [`LidData` DTO](/reference/dto/lid-data.md)

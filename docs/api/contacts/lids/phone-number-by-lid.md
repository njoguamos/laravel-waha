# Get Phone Number by LID

Retrieve the associated phone number for a specific LID.

## Usage

You can use the `Contact` facade to fetch the phone number for a given LID.

::: code-group

```php [Usage]
use NjoguAmos\Waha\Facades\Contact;

/** @var \Saloon\Http\Response $response */
$response = Contact::getPhoneNumber(lid: '123123123@lid');
```

:::

## Response

The response returned by the `getPhoneNumber` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or the `dtoOrFail` method to retrieve a `PhoneNumberData` DTO:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   // ["lid" => "123123123@lid", "pn" => "123456789@c.us"]
```

```php [DTO]
use NjoguAmos\Waha\Facades\Contact;

/** @var \NjoguAmos\Waha\Dto\PhoneNumberData $dto */
$dto = Contact::getPhoneNumber(lid: '123123123@lid')->dtoOrFail();

$dto->lid; // "123123123@lid"
$dto->pn;  // "123456789@c.us" or null if not found
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
| :---: | :-: | :---: | :--: |
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA API - Get Phone Number by LID](https://waha.devlike.pro/docs/how-to/contacts/#get-phone-number-by-lid)
- [`PhoneNumberData` DTO](/reference/dto/phone-number-data.md)

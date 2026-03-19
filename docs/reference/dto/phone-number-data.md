# Phone Number Data DTO Reference

The `NjoguAmos\Waha\Dto\PhoneNumberData` represents a response from WAHA containing the LID and associated phone number.

```php
use NjoguAmos\Waha\Facades\Contact;
use NjoguAmos\Waha\Dto\PhoneNumberData;

$response = Contact::getPhoneNumber(lid: '123123123@lid');
$dto = $response->dtoOrFail(); // PhoneNumberData
```

## `lid` → `string`

The LID for which the phone number was requested.

```php
$dto->lid; // "123123123@lid"
```

## `pn` → `string|null`

The phone number (chat ID) for the given LID. This can be `null` if no phone number is found.

```php
$dto->pn; // "123456789@c.us" or null
```

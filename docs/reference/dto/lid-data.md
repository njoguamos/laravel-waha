# Lid Data DTO Reference

The `NjoguAmos\Waha\Dto\LidData` represents a response from WAHA containing the LID and phone number associated with a chat ID.

```php
use NjoguAmos\Waha\Facades\Contact;
use NjoguAmos\Waha\Dto\LidData;

$response = Contact::getLid(phone: '123456789@c.us');
$dto = $response->dtoOrFail(); // LidData
```

## `lid` → `string|null`

The LID for the given phone number. This can be `null` if no LID is found.

```php
$dto->lid; // "123123123@lid" or null
```

## `pn` → `string`

The phone number (chat ID) for the given LID.

```php
$dto->pn; // "123456789@c.us"
```

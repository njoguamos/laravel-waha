# Contact Exists Data DTO Reference

The `NjoguAmos\Waha\Dto\ContactExistsData` represents the response from checking if a phone number exists on WhatsApp.

```php
use NjoguAmos\Waha\Facades\Contacts;

/** @var \NjoguAmos\Waha\Dto\ContactExistsData $result */
$result = Contacts::checkExists(phone: '+254780111000');
```

## `numberExists` → `bool`

Indicates whether the phone number is registered on WhatsApp.

```php
$result->numberExists; // true or false
```

## `chatId` → `string|null`

The WhatsApp chat ID of the number if it exists. Returns `null` if the number does not exist.

```php
$result->chatId; // "254722000111@c.us" or null
```

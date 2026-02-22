# Check Phone Number Exists

Check if a phone number is registered on WhatsApp, even if the number is not in your contact list. 

> [!TIP]
> This is useful for validating phone numbers before attempting to send messages.


## Usage

```php
use NjoguAmos\Waha\Facades\Contacts;

$result = Contacts::checkExists(phone: '+254722000111');
```

### With Custom Session

```php
use NjoguAmos\Waha\Facades\Contacts;

$result = Contacts::checkExists(
    phone: '+11231231231',
    session: 'my-custom-session'
);
```

## Result

The response is an instance of `NjoguAmos\Waha\Dto\ContactExistsData`.

```php
$result->numberExists; // true or false
$result->chatId;       // "123123123@c.us" or null
```

## Parameters

| Parameter | Type           | Required | Description                                               |
|-----------|----------------|----------|-----------------------------------------------------------|
| `phone`   | `string`       | Yes      | Phone number to check                                     |
| `session` | `string\|null` | No       | WhatsApp session name. Uses default from config if `null` |

## Important Notes

> [!NOTE]
> For Brazilian phone numbers, always call this endpoint before sending messages to get the correct `chatId`, as numbers registered before 2012 require an additional 9th digit.

## Important Links

- [WAHA API Documentation - Check Phone Number Exists](https://waha.devlike.pro/docs/how-to/contacts/#check-phone-number-exists)
- [ContactExistsData DTO Reference](../reference/dto/contact-exists-data)

# Update Contact

Update a contact on your phone address book (and in WhatsApp).

## Usage

You can use the `Contact` facade to update a contact.

::: code-group

```php [Chat ID]
use NjoguAmos\Waha\Facades\Contact;
use NjoguAmos\Waha\Dto\ContactUpdateData;

$data = new ContactUpdateData(firstName: 'John', lastName: 'Doe');
$contact = Contact::update(chatId: '11231231231@c.us', data: $data);
```

```php [Phone Number]
use NjoguAmos\Waha\Facades\Contact;
use NjoguAmos\Waha\Dto\ContactUpdateData;

$data = new ContactUpdateData(firstName: 'John', lastName: 'Doe');
$contact = Contact::update(chatId: '11231231231', data: $data);
```

```php [Custom Session]
use NjoguAmos\Waha\Facades\Contact;
use NjoguAmos\Waha\Dto\ContactUpdateData;

$data = new ContactUpdateData(firstName: 'John', lastName: 'Doe');
$contact = Contact::update(chatId: '11231231231', data: $data, session: 'my-session');
```

:::

## Parameters

| Parameter   | Type                  | Required | Description                                                              |
|-------------|----------------------|----------|--------------------------------------------------------------------------|
| `chatId`    | `string`             | Yes      | Chat ID (`123@c.us`, `123@lid`) or phone number (`1231231231`)           |
| `data`      | `ContactUpdateData`  | Yes      | Contact update data with `firstName` and `lastName`                      |
| `session`   | `string`             | No       | Session name (defaults to `waha.session` config)                         |

## Response

The response returned by the `update` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   // ["success" => true]
```

:::

::: tip Phone Address Book Update Note
- If you have multiple **WhatsApp** apps installed on your phone, the API might only work with one account.
- You may need to make **a few API requests** with the same parameters and wait **a few seconds** between requests to update your **phone address book**.
:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
| :---: | :-: | :---: | :--: |
|   ✅   |  ✅  |   ✅   |   ❌   |

## References

- [WAHA API - Update Contact](https://waha.devlike.pro/docs/how-to/contacts/#update-contact)
- [`ContactUpdateData` DTO](/reference/dto/contact-update-data.md)

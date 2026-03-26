# Get Contact

Retrieve a single contact by phone number, chat ID, or LID.

## Usage

You can use the `Contact` facade to get a contact.

::: code-group

```php [Phone Number]
use NjoguAmos\Waha\Facades\Contact;

$contact = Contact::get(contactId: '11231231231');
```

```php [Chat ID]
use NjoguAmos\Waha\Facades\Contact;

$contact = Contact::get(contactId: '11231231231@c.us');
```

```php [LID]
use NjoguAmos\Waha\Facades\Contact;

$contact = Contact::get(contactId: '123456@lid');
```

```php [Custom Session]
use NjoguAmos\Waha\Facades\Contact;

$contact = Contact::get(contactId: '11231231231', session: 'my-session');
```

:::

## Parameters

| Parameter   | Type     | Required | Description                                                              |
|-------------|----------|----------|--------------------------------------------------------------------------|
| `contactId` | `string` | Yes      | Phone number, chat ID (`123@c.us`), or LID (`123@lid`)                   |
| `session`   | `string` | No       | Session name (defaults to `waha.session` config)                         |

## Response

The response returned by the `get` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or the `dtoOrFail` method to retrieve a `ContactData` DTO:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   // ["id" => "11231231231@c.us", "number" => "11231231231", ...]
```

```php [DTO]
use NjoguAmos\Waha\Facades\Contact;

/** @var \NjoguAmos\Waha\Dto\ContactData $contact */
$contact = Contact::get(contactId: '11231231231')->dtoOrFail();

$contact->id;          // "11231231231@c.us"
$contact->number;      // "11231231231"
$contact->name;        // "Contact Name"
$contact->pushname;    // "Pushname"
$contact->shortName;   // "Shortname"
$contact->isMe;        // false
$contact->isGroup;     // false
$contact->isWAContact; // true
$contact->isMyContact; // true
$contact->isBlocked;   // false
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
| :---: | :-: | :---: | :--: |
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA API - Contacts](https://waha.devlike.pro/docs/how-to/contacts/)
- [`ContactData` DTO](/reference/dto/contact-data.md)

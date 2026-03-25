# Get All Contacts

Retrieve all contacts for a session with optional pagination and sorting.

## Usage

You can use the `Contact` facade to get all contacts.

::: code-group

```php [Default]
use NjoguAmos\Waha\Facades\Contact;

$contacts = Contact::all();
```

```php [Pagination]
use NjoguAmos\Waha\Facades\Contact;

$contacts = Contact::all(limit: 50, offset: 0);
```

```php [Sorting]
use NjoguAmos\Waha\Facades\Contact;

$contacts = Contact::all(sortBy: 'name', sortOrder: 'asc');
```

```php [Pagination + Sorting]
use NjoguAmos\Waha\Facades\Contact;

$contacts = Contact::all(sortBy: 'name', sortOrder: 'asc', limit: 50, offset: 0);
```

```php [Custom Session]
use NjoguAmos\Waha\Facades\Contact;

$contacts = Contact::all(session: 'my-session');
```

:::

## Parameters

| Parameter   | Type     | Required | Default   | Description                                           |
|-------------|----------|----------|-----------|-------------------------------------------------------|
| `sortBy`    | `string` | No       | `name`    | Sort by field: `id` or `name`                         |
| `sortOrder` | `string` | No       | `desc`    | Sort order: `desc` (Z→A) or `asc` (A→Z)               |
| `limit`     | `int`    | No       | `100`     | Number of contacts to return                          |
| `offset`    | `int`    | No       | `0`       | Number of contacts to skip                            |
| `session`   | `string` | No       | `default` | Session name (defaults to `waha.session` config)      |

## Response

The response returned by the `all` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or the `dtoOrFail` method to retrieve an array of `ContactData` DTOs:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   // [["id" => "11231231231@c.us", "number" => "11231231231", ...]]
```

```php [DTO]
use NjoguAmos\Waha\Facades\Contact;

/** @var \NjoguAmos\Waha\Dto\ContactData[] $contacts */
$contacts = Contact::all()->dtoOrFail();

foreach ($contacts as $contact) {
    $contact->id;          // "11231231231@c.us"
    $contact->number;      // "11231231231"
    $contact->name;        // "Contact Name"
    $contact->pushname;    // "Pushname"
    $contact->shortName;   // "Shortname"
    $contact->isMe;        // true
    $contact->isGroup;     // false
    $contact->isWAContact; // true
    $contact->isMyContact; // true
    $contact->isBlocked;   // false
}
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
| :---: | :-: | :---: | :--: |
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA API - Contacts Pagination](https://waha.devlike.pro/docs/how-to/contacts/#contacts-pagination)
- [`ContactData` DTO](/reference/dto/contact-data.md)

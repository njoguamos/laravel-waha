# Unblock Contact

Unblock contact on WhatsApp.

## Usage

The `Contact` facade's `unblock` method may be used to unblock a contact.

::: code-group

```php [Usage]
use NjoguAmos\Waha\Facades\Contact;

/** @var \Saloon\Http\Response $response */
$response = Contact::unblock(contactId: '11231231231');
```

:::

## Response

The response returned by the `unblock` method is an instance of `Saloon\Http\Response`.

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   // []
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
| :---: | :-: | :---: | :--: |
|   ✅   |  ✅  |       |      |

## References

- [WAHA API - Unblock contact](https://waha.devlike.pro/docs/how-to/contacts/#unblock-contact)

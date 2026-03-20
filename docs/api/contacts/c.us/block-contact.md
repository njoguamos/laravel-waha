# Block Contact

Block contact on WhatsApp.

## Usage

The `Contact` facade's `block` method may be used to block a contact.

::: code-group

```php [Usage]
use NjoguAmos\Waha\Facades\Contact;

/** @var \Saloon\Http\Response $response */
$response = Contact::block(contactId: '11231231231');
```

:::

## Response

The response returned by the `block` method is an instance of `Saloon\Http\Response`.

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

- [WAHA API - Block contact](https://waha.devlike.pro/docs/how-to/contacts/#block-contact)

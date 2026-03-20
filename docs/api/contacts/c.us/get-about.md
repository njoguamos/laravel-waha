# Get "About" Contact

Gets the Contact's "about" (status) info.

## Usage

The `Contact` facade's `getAbout` method may be used to retrieve the "about" (status) information for a specific contact.

::: code-group

```php [Usage]
use NjoguAmos\Waha\Facades\Contact;

/** @var \Saloon\Http\Response $response */
$response = Contact::getAbout(
    contactId: '1234567890@c.us',
    session: 'default'
);
```

::::

## Response

The response returned by the `getAbout` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   // ['about' => 'Hi, I use WhatsApp!']
```

::::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
| :---: | :-: | :---: | :--: |
|   ✅   |  ✅  |       |      |

## References

- [WAHA API - Get “about” contact](https://waha.devlike.pro/docs/how-to/contacts/#get-about-contact)

# Get Profile Picture

Get contact's profile picture URL.

## Usage

The `Contact` facade's `getProfilePicture` method may be used to retrieve the profile picture URL for a specific contact.

::: code-group

```php [Usage]
use NjoguAmos\Waha\Facades\Contact;

/** @var \Saloon\Http\Response $response */
$response = Contact::getProfilePicture(
    contactId: '1234567890@c.us',
    refresh: true, // Optional: force refresh the picture
    session: 'default'
);
```

::::

::: warning
By default, photo is cached it 24 hours. Do not frequently refresh the picture to avoid rate-overlimit error.
:::


## Response

The response returned by the `getProfilePicture` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   // ['profilePictureURL' => 'https://example.com/profile.jpg']
```

::::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
| :---: | :-: | :---: | :--: |
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA API - Get profile picture](https://waha.devlike.pro/docs/how-to/contacts/#get-profile-picture)

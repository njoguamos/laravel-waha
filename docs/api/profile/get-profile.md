# Get Profile

Get your WhatsApp profile information.

## Usage

::: code-group

```php [Default Session]
use NjoguAmos\Waha\Facades\Profile;

/** @var \Saloon\Http\Response $response */
$response = Profile::get();
```

```php [Specific Session]
use NjoguAmos\Waha\Facades\Profile;

/** @var \Saloon\Http\Response $response */
$response = Profile::get(session: 'my-session');
```

:::

## Response

The response returned by the `get` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or the `dtoOrFail` method to retrieve a `ProfileData` DTO:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   // ["id" => "11111111111@c.us", "name" => "My Name", "picture" => "..."]
```

```php [DTO]
use NjoguAmos\Waha\Facades\Profile;
use NjoguAmos\Waha\Dto\ProfileData;

/** @var ProfileData $profile */
$profile = Profile::get()->dtoOrFail();

$profile->id;      // "11111111111@c.us"
$profile->name;    // "My Name"
$profile->picture; // "https://pps.whatsapp.net/v/t/123.jpg" or null
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA Profile Documentation](https://waha.devlike.pro/docs/how-to/profile/)
- [`ProfileData` DTO](/reference/dto/profile-data.md)

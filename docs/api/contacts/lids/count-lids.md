# Get Count of LIDs

Returns the number of known LID mappings for a session.

## Usage

You can use the `Contact` facade to get the count of LID mappings for a session.

::: code-group

```php [Usage]
use NjoguAmos\Waha\Facades\Contact;

/** @var \Saloon\Http\Response $response */
$response = Contact::lidCount();
```

:::

## Response

The response returned by the `lidCount` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array.

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   // ["count" => 123]
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
| :---: | :-: | :---: | :--: |
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [WAHA API - Get Count of LIDs](https://waha.devlike.pro/docs/how-to/contacts/#get-count-of-lids)

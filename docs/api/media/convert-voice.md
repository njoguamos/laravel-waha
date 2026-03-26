# Convert Voice to WhatsApp Format (opus)

Convert any audio file to WhatsApp voice message format (ogg opus).

## Usage

The `Media` facade's `convertVoice` method may be used to convert an audio file to a WhatsApp-compatible voice message format.

::: code-group

```php [URL]
use NjoguAmos\Waha\Facades\Media;
use NjoguAmos\Waha\Dto\MediaConvertData;

$data = new MediaConvertData(
    url: 'https://example.com/voice.mp3'
);

/** @var \Saloon\Http\Response $response */
$response = Media::convertVoice(data: $data);
```

```php [Base64]
use NjoguAmos\Waha\Facades\Media;
use NjoguAmos\Waha\Dto\MediaConvertData;

$data = new MediaConvertData(
    data: 'base64_encoded_audio_content'
);

/** @var \Saloon\Http\Response $response */
$response = Media::convertVoice(data: $data);
```

:::

## Response

The response returned by the `convertVoice` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or use it as a binary stream.

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 200
$response->json();   // If application/json is requested
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ➕ | ➕ | ➕ | ➕ |

## References

- [`MediaConvertData` DTO](/reference/dto/media-convert-data.md)
- [WAHA Documentation: Media Conversion](https://waha.devlike.pro/docs/how-to/media/#convert-media)

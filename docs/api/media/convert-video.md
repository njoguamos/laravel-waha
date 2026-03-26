# Convert Video to WhatsApp Format (mp4)

Convert any video file to WhatsApp video message format (mp4).

## Usage

The `Media` facade's `convertVideo` method may be used to convert a video file to a WhatsApp-compatible format.

::: code-group

```php [URL]
use NjoguAmos\Waha\Facades\Media;
use NjoguAmos\Waha\Dto\MediaConvertData;

$data = new MediaConvertData(
    url: 'https://example.com/video.mkv'
);

/** @var \Saloon\Http\Response $response */
$response = Media::convertVideo(data: $data);
```

```php [Base64]
use NjoguAmos\Waha\Facades\Media;
use NjoguAmos\Waha\Dto\MediaConvertData;

$data = new MediaConvertData(
    data: 'base64_encoded_video_content'
);

/** @var \Saloon\Http\Response $response */
$response = Media::convertVideo(data: $data);
```

:::

## Response

The response returned by the `convertVideo` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array or use it as a binary stream.

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

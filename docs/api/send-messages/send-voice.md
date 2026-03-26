# Send Voice

Send voice messages (audio recordings) to a chat.

## Usage

The `Message` facade's `sendVoice` method may be used to send a voice message to a chat. You must provide a `MessageVoiceData` DTO.

::: code-group

```php [URL]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageVoiceData;

$data = new MessageVoiceData(
    chatId: '123456789@c.us',
    file: 'https://example.com/voice.opus',
);

$response = Message::sendVoice(data: $data);
```

```php [BASE64]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageVoiceData;

$data = new MessageVoiceData(
    chatId: '123456789@c.us',
    file: 'data:audio/ogg;base64,base64-encoded-data...',
);

$response = Message::sendVoice(data: $data);
```

```php [Reply to Message]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageVoiceData;

$data = new MessageVoiceData(
    chatId: '123456789@c.us',
    file: 'https://example.com/voice.opus',
    reply_to: 'false_1111@c.us_AAA',
);

$response = Message::sendVoice(data: $data);
```

::: warning Voice File Format
WhatsApp accept only file with **OPUS encoding** and packed in **OGG container**.

If you have a file in a different format (like mp3) you can use the `convert: true` option to have WAHA convert it for you automatically.
:::

:::

## Response

The response returned by the `sendVoice` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 201
$response->json();   // ["id" => "...", ...]
```

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessageVoiceData;

$data = new MessageVoiceData(
    chatId: '123456789@c.us',
    file: 'https://example.com/voice.opus',
);

$response = Message::sendVoice(data: $data);
$json = $response->json();
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [`MessageVoiceData` DTO](/reference/dto/message-voice-data.md)
- [WAHA Documentation: Send Voice](https://waha.devlike.pro/docs/how-to/send-messages/#send-voice)

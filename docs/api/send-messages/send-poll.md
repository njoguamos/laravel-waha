# Send Poll

Send a poll to a chat.

## Usage

The `Message` facade's `sendPoll` method may be used to send a poll to a chat. You must provide a `MessagePollData` DTO containing the chat ID and a `PollData` DTO with the poll question and options.

::: code-group

```php [Basic]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessagePollData;
use NjoguAmos\Waha\Dto\PollData;

$data = new MessagePollData(
    chatId: '123456789@c.us',
    poll: new PollData(
        name: 'How are you?',
        options: ['Awesome!', 'Good!', 'Not bad!'],
    ),
);

$response = Message::sendPoll(data: $data);
```

```php [Multiple Answers]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessagePollData;
use NjoguAmos\Waha\Dto\PollData;

$data = new MessagePollData(
    chatId: '123456789@c.us',
    poll: new PollData(
        name: 'Pick your favorites',
        options: ['Red', 'Blue', 'Green'],
        multipleAnswers: true,
    ),
);

$response = Message::sendPoll(data: $data);
```

```php [Reply to Message]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessagePollData;
use NjoguAmos\Waha\Dto\PollData;

$data = new MessagePollData(
    chatId: '123456789@c.us',
    poll: new PollData(
        name: 'How are you?',
        options: ['Awesome!', 'Good!', 'Not bad!'],
    ),
    reply_to: 'false_1111@c.us_AAA',
);

$response = Message::sendPoll(data: $data);
```

:::

::: warning Save the Poll ID
Save the `id` field from the response in your database so that you can identify the poll for which you receive a vote (see webhook events below).
:::

## Response

The response returned by the `sendPoll` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 201
$response->json();   // ["id" => "...", ...]
```

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessagePollData;
use NjoguAmos\Waha\Dto\PollData;

$data = new MessagePollData(
    chatId: '123456789@c.us',
    poll: new PollData(
        name: 'How are you?',
        options: ['Awesome!', 'Good!', 'Not bad!'],
    ),
);

$response = Message::sendPoll(data: $data);
$json = $response->json();
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ✅   |  ✅  |   ✅   |  ✅   |

## References

- [`MessagePollData` DTO](/reference/dto/message-poll-data.md)
- [`PollData` DTO](/reference/dto/poll-data.md)
- [WAHA Documentation: Polls](https://waha.devlike.pro/docs/how-to/polls/)

# Send Poll Vote

Vote on a poll.

## Usage

The `Message` facade's `sendPollVote` method may be used to submit a vote on a poll. You must provide a `MessagePollVoteData` DTO containing the chat ID, the poll message ID, and the selected options.

::: code-group

```php [Single Vote]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessagePollVoteData;

$data = new MessagePollVoteData(
    chatId: '123456789@c.us',
    pollMessageId: 'false_123456789@c.us_AAAAAAAAAAAAAAAAAAAA',
    votes: ['Awesome!'],
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendPollVote(data: $data);
```

```php [Multiple Votes]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessagePollVoteData;

$data = new MessagePollVoteData(
    chatId: '123456789@c.us',
    pollMessageId: 'false_123456789@c.us_AAAAAAAAAAAAAAAAAAAA',
    votes: ['Awesome!', 'Good!'],
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendPollVote(data: $data);
```

:::

## Response

The response returned by the `sendPollVote` method is an instance of `Saloon\Http\Response`. You may use the `json` method to retrieve the response as an array:

::: code-group

```php [Saloon Response]
/** @var \Saloon\Http\Response $response */

$response->status(); // 201
$response->json();   // ["id" => "false_123456789@c.us_BAE6A33293978B16", "timestamp" => 1629200000, ...]
```

```php [DTO]
use NjoguAmos\Waha\Facades\Message;
use NjoguAmos\Waha\Dto\MessagePollVoteData;

$data = new MessagePollVoteData(
    chatId: '123456789@c.us',
    pollMessageId: 'false_123456789@c.us_AAAAAAAAAAAAAAAAAAAA',
    votes: ['Awesome!'],
);

/** @var \Saloon\Http\Response $response */
$response = Message::sendPollVote(data: $data);
$json = $response->json();
```

:::

## Engines

| WEBJS | WPP | NOWEB | GOWS |
|:---:|:---:|:---:|:---:|
| ✔️ | ✔️ | ✔️ | ✔️ |

➕ = supported, ➖ = not supported

The "Engines" table reflects WAHA API-level engine support (WEBJS, WPP, NOWEB, GOWS) and is independent of any wrapper/feature implementation.

## References

- [`MessagePollVoteData` DTO](/reference/dto/message-poll-vote-data.md)
- [WAHA Documentation: Polls](https://waha.devlike.pro/docs/how-to/polls/)

# Message Poll Vote Data DTO Reference

The `NjoguAmos\Waha\Dto\MessagePollVoteData` represents a vote on a poll.

## `chatId` → `string`

The chat ID where the poll exists.

## `pollMessageId` → `string`

The ID of the poll message.

## `votes` → `array`

Array of arrays containing the poll options to vote for. Example: `[["Awesome!"]]`.

## `pollServerId` → `int` or `null`

Only for Channels - server message ID (if known).

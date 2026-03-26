# Message Reaction Data DTO Reference

The `NjoguAmos\Waha\Dto\MessageReactionData` represents a message reaction.

## `chatId` → `string`

The chat ID where the message is located.

## `messageId` → `string`

The ID of the message to react to.

## `reaction` → `string` or `null`

The reaction emoji. Set to `null` to remove a reaction.

# Message Text Data DTO Reference

The `NjoguAmos\Waha\Dto\MessageTextData` represents a text message to be sent.

## `chatId` → `string`

The recipient's chat ID.

## `text` → `string`

The message content.

## `linkPreview` → `bool`

Whether to include link previews. Default: `true`.

## `linkPreviewHighQuality` → `bool`

Whether to use high-quality link previews. Default: `true`.

## `reply_to` → `string` or `null`

The ID of the message to reply to.

## `mentions` → `array` or `null`

Optional array of IDs to mention in the message.

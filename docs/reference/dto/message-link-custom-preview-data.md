# Message Link Custom Preview Data DTO Reference

The `NjoguAmos\Waha\Dto\MessageLinkCustomPreviewData` represents a message with a custom link preview.

## `chatId` → `string`

The recipient's chat ID.

## `text` → `string`

The message text. MUST include the URL.

## `preview` → `LinkPreviewData`

The custom preview data.

## `replyTo` → `string` or `null`

The ID of the message to reply to.

## `linkPreviewHighQuality` → `bool`

Whether to use high-quality link previews. Default: `true`.

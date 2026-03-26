# Message List Data DTO Reference

The `NjoguAmos\Waha\Dto\MessageListData` represents an interactive list message.

## `chatId` → `string`

The recipient's chat ID.

## `title` → `string`

The title of the list message.

## `button` → `string`

The text for the button that opens the list.

## `sections` → `MessageListSectionData[]`

An array of sections in the list.

## `description` → `string` or `null`

Optional description text for the list.

## `footer` → `string` or `null`

Optional footer text for the list.

## `replyTo` → `string` or `null`

The ID of the message to reply to.

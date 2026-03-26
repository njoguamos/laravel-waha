# Message Image Data DTO Reference

The `NjoguAmos\Waha\Dto\MessageImageData` represents an image message to be sent.

## `chatId` → `string`

The recipient's chat ID.

## `file` → `array`

The image file. Can be a remote file (`['url' => '...']`) or a binary file (`['mimetype' => '...', 'data' => '...']`).

## `reply_to` → `string` or `null`

The ID of the message to reply to.

## `caption` → `string` or `null`

Optional caption for the image.

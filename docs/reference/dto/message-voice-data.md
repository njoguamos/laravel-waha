# Message Voice Data DTO Reference

The `NjoguAmos\Waha\Dto\MessageVoiceData` represents a voice message to be sent.

## `chatId` → `string`

The recipient's chat ID.

## `file` → `string`

The voice file. Can be a URL (e.g., `https://...`) or a base64 data URI (e.g., `data:audio/ogg;base64,...`).

## `filename` → `string` or `null`

The name of the file to be sent. If not provided, it will be automatically determined from the URL or set to `file` for base64 data.

## `mimetype` → `string` or `NjoguAmos\Waha\Enums\FileType` or `null`

The mimetype of the file. If not provided, it will be automatically determined from the URL or base64 data.

## `convert` → `bool`

Whether to convert the input file to the required format (OGG/OPUS) using ffmpeg before sending. Default: `true`.

## `reply_to` → `string` or `null`

The ID of the message to reply to.

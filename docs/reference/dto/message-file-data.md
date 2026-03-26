# Message File Data DTO Reference

The `NjoguAmos\Waha\Dto\MessageFileData` represents a file (document) message to be sent.

## `chatId` → `string`

The recipient's chat ID.

## `file` → `string`

The file source. This can be:
- A URL to a remote file (e.g., `https://example.com/document.pdf`).
- A base64-encoded string, preferably using a data URI (e.g., `data:application/pdf;base64,...`).

## `filename` → `string` or `null`

The name of the file. If null, the package will attempt to determine it from the URL or use a default value.

## `mimetype` → `string` or `NjoguAmos\Waha\Enums\FileType` or `null`

The mimetype of the file. You may provide a string or use the `FileType` enum. If null, the package will attempt to determine it automatically.

## `reply_to` → `string` or `null`

The ID of the message to reply to.

## `caption` → `string` or `null`

Optional caption for the file.

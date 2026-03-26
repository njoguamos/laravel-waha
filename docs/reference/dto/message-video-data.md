# Message Video Data DTO Reference

The `NjoguAmos\Waha\Dto\MessageVideoData` represents a video message to be sent.

## `chatId` → `string`

The recipient's chat ID.

## `file` → `array`

The video file. Can be a remote file (`['url' => '...']`) or a binary file (`['mimetype' => '...', 'data' => '...']`).

## `convert` → `bool`

Whether to convert the input file to the required format using ffmpeg before sending. Default: `true`.

## `reply_to` → `string` or `null`

The ID of the message to reply to.

## `caption` → `string` or `null`

Optional caption for the video.

## `asNote` → `bool`

Send as video note (aka instant or round video). Default: `false`.

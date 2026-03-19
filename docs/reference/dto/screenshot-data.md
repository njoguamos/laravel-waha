# Screenshot Data DTO Reference

The `NjoguAmos\Waha\Dto\ScreenshotData` contains information about a session screenshot.

## `mimetype` → `string`

The mimetype of the screenshot.

```php
$screenshot->mimetype; // "image/png"
```

## `data` → `string`

The base64 encoded data of the screenshot.

```php
$screenshot->data; // "base64-encoded-data"
```

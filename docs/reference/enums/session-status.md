# Session Status Enum Reference

The `NjoguAmos\Waha\Enums\SessionStatus` enum represents the possible statuses of a WhatsApp session.

## Cases

| Case | Value | Description |
| --- | --- | --- |
| `STOPPED` | `STOPPED` | The session is stopped. |
| `STARTING` | `STARTING` | The session is starting. |
| `SCAN_QR_CODE` | `SCAN_QR_CODE` | The session requires a QR code scan or login via phone number. |
| `WORKING` | `WORKING` | The session is working and ready to use. |
| `FAILED` | `FAILED` | The session failed due to an error. |

## Usage

```php
use NjoguAmos\Waha\Enums\SessionStatus;

if ($session->status === SessionStatus::WORKING) {
    // Session is ready
}
```

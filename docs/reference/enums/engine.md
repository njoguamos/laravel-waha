# Engine Enum Reference

The `NjoguAmos\Waha\Enums\Engine` enum defines the available engines for WhatsApp sessions in WAHA.

```php
use NjoguAmos\Waha\Enums\Engine;

Engine::WEBJS; // 'WEBJS'
Engine::WPP;   // 'WPP'
Engine::GOWS;  // 'GOWS'
Engine::NOWEB; // 'NOWEB'
```

## Cases

| Case | Value | Description |
| --- | --- | --- |
| `WEBJS` | `WEBJS` | Connects via WhatsApp Web using Puppeteer to avoid detection. |
| `WPP` | `WPP` | Connects via WhatsApp Web using Puppeteer to avoid detection. |
| `GOWS` | `GOWS` | Connects directly via WebSocket without requiring a browser. |
| `NOWEB` | `NOWEB` | Connects directly via WebSocket, saving CPU and memory by not running Chromium. |

## Usage

```php
use NjoguAmos\Waha\Enums\Engine;

$engine = Engine::WEBJS;

echo $engine->label(); // 'WEBJS'
echo $engine->description(); // 'Connects via WhatsApp Web using Puppeteer to avoid detection.'
```

## References
- [WAHA Engines Documentation](https://waha.devlike.pro/docs/how-to/engines/#engines)

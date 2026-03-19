# Version Enum Reference

The `NjoguAmos\Waha\Enums\Version` enum defines the available versions of WAHA.

```php
use NjoguAmos\Waha\Enums\Version;

Version::CORE; // 'CORE'
Version::PRO;  // 'PRO'
```

## Cases

| Case | Value | Description |
| --- | --- | --- |
| `CORE` | `CORE` | Free version of WAHA with basic features. |
| `PRO` | `PRO` | Plus or pro version of WAHA with advanced features. |

## Usage

```php
use NjoguAmos\Waha\Enums\Version;

$version = Version::CORE;

echo $version->label(); // 'Core'
echo $version->description(); // 'Free version of WAHA with basic features.'
```

## References
- [WAHA Versions Support](https://waha.devlike.pro/support-us/)

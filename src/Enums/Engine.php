<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Enums;

/**  @see https://waha.devlike.pro/docs/how-to/engines/#engines */
enum Engine: string
{
    case WEBJS = 'WEBJS';

    case GOWS = 'GOWS';

    case NOWEB = 'NOWEB';

    public function label(): string
    {
        return match ($this) {
            self::WEBJS => 'WEBJS',
            self::GOWS  => 'GOWS',
            self::NOWEB => 'NOWEB',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::WEBJS => 'Connects via WhatsApp Web using Puppeteer to avoid detection.',
            self::GOWS  => 'Connects directly via WebSocket without requiring a browser.',
            self::NOWEB => 'Connects directly via WebSocket, saving CPU and memory by not running Chromium.',
        };
    }
}

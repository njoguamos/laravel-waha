<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Enums;

enum AppType: string
{
    case CHATWOOT = 'chatwoot';

    case CALLS = 'calls';

    public function label(): string
    {
        return match ($this) {
            self::CHATWOOT => 'ChatWoot',
            self::CALLS    => 'Calls',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::CHATWOOT => 'Use your WhatsApp in ChatWoot CRM',
            self::CALLS    => 'Automatically reject calls and auto-reply with a message',
        };
    }
}

<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Enums;

/** @see https://waha.devlike.pro/support-us/ */
enum Version: string
{
    case CORE = 'CORE';

    case PRO = 'PLUS';

    public function label(): string
    {
        return match ($this) {
            self::CORE => 'Core',
            self::PRO  => 'Pro',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::CORE => 'Free version of WAHA with basic features.',
            self::PRO  => 'Plus or pro version of WAHA with advanced features.',
        };
    }
}

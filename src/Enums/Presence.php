<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Enums;

/** @see https://waha.devlike.pro/docs/how-to/presence/ */
enum Presence: string
{
    case ONLINE = 'online';

    case OFFLINE = 'offline';

    case TYPING = 'typing';

    case RECORDING = 'recording';

    case PAUSED = 'paused';
}

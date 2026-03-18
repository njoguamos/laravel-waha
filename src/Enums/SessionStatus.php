<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Enums;

/** @see https://waha.devlike.pro/docs/how-to/sessions/#get-session */
enum SessionStatus: string
{
    case STOPPED = 'STOPPED';

    case STARTING = 'STARTING';

    case SCAN_QR_CODE = 'SCAN_QR_CODE';

    case WORKING = 'WORKING';

    case FAILED = 'FAILED';
}

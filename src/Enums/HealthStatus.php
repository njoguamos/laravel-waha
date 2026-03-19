<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Enums;

/** @see https://waha.devlike.pro/docs/how-to/observability/#health-check */
enum HealthStatus: string
{
    case ERROR = 'error';

    case OK = 'ok';

    case SHUTTING_DOWN = 'shutting_down';
}

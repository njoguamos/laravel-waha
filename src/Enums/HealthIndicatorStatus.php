<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Enums;

/** @see https://waha.devlike.pro/docs/how-to/observability/#health-check */
enum HealthIndicatorStatus: string
{
    case UP = 'up';

    case DOWN = 'down';
}

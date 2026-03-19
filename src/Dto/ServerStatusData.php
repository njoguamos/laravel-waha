<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Dto;

use Carbon\CarbonImmutable;

class ServerStatusData
{
    public function __construct(
        public CarbonImmutable $startTimestamp,
        public int $uptime,
    ) {
    }

    public function toArray(): array
    {
        return [
            'startTimestamp' => $this->startTimestamp->getPreciseTimestamp(3),
            'uptime'         => $this->uptime,
        ];
    }
}

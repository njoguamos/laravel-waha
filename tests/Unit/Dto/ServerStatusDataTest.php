<?php

declare(strict_types=1);

use Carbon\CarbonImmutable;
use NjoguAmos\Waha\Dto\ServerStatusData;

test('server status data to array', function () {
    $timestamp = CarbonImmutable::parse('2024-01-01 00:00:00');
    $data = new ServerStatusData(
        startTimestamp: $timestamp,
        uptime: 3600,
    );

    $array = $data->toArray();

    expect($array['uptime'])->toBe(3600)
        ->and($array['startTimestamp'])->toBe($timestamp->getPreciseTimestamp(3));
});

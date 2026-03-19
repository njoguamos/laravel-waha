<?php

declare(strict_types=1);

use NjoguAmos\Waha\Enums\HealthStatus;
use NjoguAmos\Waha\Dto\HealthCheckData;
use NjoguAmos\Waha\Dto\HealthIndicatorData;
use NjoguAmos\Waha\Enums\HealthIndicatorStatus;

test('health check data can be created from array', function () {
    $data = HealthCheckData::fromArray([
        'status' => 'ok',
        'info'   => [
            'disk' => ['status' => 'up', 'free' => 1024],
        ],
        'error'   => [],
        'details' => [
            'disk' => ['status' => 'up', 'free' => 1024],
        ],
    ]);

    expect($data->status)->toBe(HealthStatus::OK)
        ->and($data->info['disk'])->toBeInstanceOf(HealthIndicatorData::class)
        ->and($data->error)->toBe([])
        ->and($data->details['disk'])->toBeInstanceOf(HealthIndicatorData::class);
});

test('health check data to array', function () {
    $data = new HealthCheckData(
        status: HealthStatus::OK,
        info: [
            'disk' => new HealthIndicatorData(
                status: HealthIndicatorStatus::UP,
                free: 1024,
            ),
        ],
        error: [],
        details: [],
    );

    $array = $data->toArray();

    expect($array)->toBe([
        'status' => 'ok',
        'info'   => [
            'disk' => ['status' => 'up', 'free' => 1024],
        ],
        'error'   => [],
        'details' => [],
    ]);
});

test('health check data with error status', function () {
    $data = HealthCheckData::fromArray([
        'status' => 'error',
        'info'   => [],
        'error'  => [
            'disk' => ['status' => 'down', 'message' => 'No space left'],
        ],
        'details' => [],
    ]);

    expect($data->status)->toBe(HealthStatus::ERROR)
        ->and($data->error['disk']->status)->toBe(HealthIndicatorStatus::DOWN)
        ->and($data->error['disk']->message)->toBe('No space left');
});

<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\HealthIndicatorData;
use NjoguAmos\Waha\Enums\HealthIndicatorStatus;

test('health indicator data can be created from array', function () {
    $data = HealthIndicatorData::fromArray([
        'status'    => 'up',
        'path'      => '/storage',
        'diskPath'  => '/var/storage',
        'free'      => 1024,
        'threshold' => 512,
        'message'   => 'OK',
    ]);

    expect($data->status)->toBe(HealthIndicatorStatus::UP)
        ->and($data->path)->toBe('/storage')
        ->and($data->diskPath)->toBe('/var/storage')
        ->and($data->free)->toBe(1024)
        ->and($data->threshold)->toBe(512)
        ->and($data->message)->toBe('OK');
});

test('health indicator data can handle null optional values', function () {
    $data = HealthIndicatorData::fromArray([
        'status' => 'down',
    ]);

    expect($data->status)->toBe(HealthIndicatorStatus::DOWN)
        ->and($data->path)->toBeNull()
        ->and($data->diskPath)->toBeNull()
        ->and($data->free)->toBeNull()
        ->and($data->threshold)->toBeNull()
        ->and($data->message)->toBeNull();
});

test('health indicator data to array filters null values', function () {
    $data = new HealthIndicatorData(
        status: HealthIndicatorStatus::UP,
    );

    expect($data->toArray())->toBe([
        'status' => 'up',
    ]);
});

test('health indicator data to array includes all values', function () {
    $data = new HealthIndicatorData(
        status: HealthIndicatorStatus::UP,
        path: '/storage',
        diskPath: '/var/storage',
        free: 1024,
        threshold: 512,
        message: 'OK',
    );

    expect($data->toArray())->toBe([
        'status'    => 'up',
        'path'      => '/storage',
        'diskPath'  => '/var/storage',
        'free'      => 1024,
        'threshold' => 512,
        'message'   => 'OK',
    ]);
});

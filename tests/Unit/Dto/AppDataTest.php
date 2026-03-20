<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\AppData;
use NjoguAmos\Waha\Enums\AppType;

test('app data to array with defaults', function () {
    $data = new AppData(
        session: 'default',
        app: AppType::CHATWOOT,
    );

    expect($data->toArray())->toBe([
        'session' => 'default',
        'app'     => 'chatwoot',
        'enabled' => true,
        'config'  => [],
    ]);
});

test('app data to array with id', function () {
    $data = new AppData(
        session: 'default',
        app: AppType::CHATWOOT,
        enabled: true,
        id: 'app-123',
        config: ['url' => 'https://chatwoot.example.com'],
    );

    $array = $data->toArray();

    expect($array)->toBe([
        'session' => 'default',
        'app'     => 'chatwoot',
        'enabled' => true,
        'config'  => ['url' => 'https://chatwoot.example.com'],
        'id'      => 'app-123',
    ]);
});

test('app data to array excludes id when null', function () {
    $data = new AppData(
        session: 'default',
        app: AppType::CALLS,
        id: null,
    );

    expect($data->toArray())->not->toHaveKey('id');
});

test('app data supports calls app type', function () {
    $data = new AppData(
        session: 'default',
        app: AppType::CALLS,
        config: ['message' => 'Auto reply'],
    );

    expect($data->toArray()['app'])->toBe('calls');
});

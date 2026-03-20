<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SessionConfigData;
use NjoguAmos\Waha\Dto\SessionCreateData;

test('session create data to array with defaults', function () {
    $data = new SessionCreateData(name: 'default');

    expect($data->toArray())->toBe([
        'name'  => 'default',
        'start' => true,
    ]);
});

test('session create data to array with config', function () {
    $config = SessionConfigData::fromArray([
        'webhooks' => [],
        'debug'    => false,
        'metadata' => [],
    ]);

    $data = new SessionCreateData(
        name: 'default',
        start: false,
        config: $config,
    );

    $array = $data->toArray();

    expect($array)->toBe([
        'name'   => 'default',
        'start'  => false,
        'config' => $config->toArray(),
    ]);
});

test('session create data to array with apps', function () {
    $apps = [
        ['session' => 'default', 'app' => 'chatwoot', 'enabled' => true],
    ];

    $data = new SessionCreateData(
        name: 'default',
        apps: $apps,
    );

    expect($data->toArray())->toBe([
        'name'  => 'default',
        'start' => true,
        'apps'  => $apps,
    ]);
});

test('session create data to array excludes null config and apps', function () {
    $data = new SessionCreateData(
        name: 'default',
        config: null,
        apps: null,
    );

    $array = $data->toArray();

    expect($array)->not->toHaveKey('config')
        ->and($array)->not->toHaveKey('apps');
});

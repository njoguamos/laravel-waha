<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SessionConfigData;
use NjoguAmos\Waha\Dto\SessionUpdateData;

test('session update data to array with null values', function () {
    $data = new SessionUpdateData();

    expect($data->toArray())->toBe([]);
});

test('session update data to array with config', function () {
    $config = SessionConfigData::fromArray([
        'webhooks' => [],
        'debug'    => true,
        'metadata' => [],
    ]);

    $data = new SessionUpdateData(config: $config);

    $array = $data->toArray();

    expect($array)->toHaveKey('config')
        ->and($array['config'])->toBe($config->toArray());
});

test('session update data to array with apps', function () {
    $apps = [
        ['session' => 'default', 'app' => 'chatwoot', 'enabled' => true],
    ];

    $data = new SessionUpdateData(apps: $apps);

    expect($data->toArray())->toBe([
        'apps' => $apps,
    ]);
});

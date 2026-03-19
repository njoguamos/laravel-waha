<?php

declare(strict_types=1);

use NjoguAmos\Waha\Enums\Engine;
use NjoguAmos\Waha\Enums\Version;
use NjoguAmos\Waha\Dto\ServerVersionData;

it(description: 'can be converted to an array', closure: function () {
    $data = new ServerVersionData(
        version: '2024.2.3',
        engine:  Engine::NOWEB,
        tier:    Version::PRO,
        browser: '/usr/bin/google-chrome-stable',
    );

    expect(value: $data->toArray())->toBe(expected: [
        'version' => '2024.2.3',
        'engine'  => 'NOWEB',
        'tier'    => 'PLUS',
        'browser' => '/usr/bin/google-chrome-stable',
    ]);
});

it(description: 'can handle null browser', closure: function () {
    $data = new ServerVersionData(
        version: '2024.2.3',
        engine:  Engine::NOWEB,
        tier:    Version::PRO,
    );

    expect(value: $data->browser)->toBeNull();
});

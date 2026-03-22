<?php

declare(strict_types=1);

use NjoguAmos\Waha\Enums\Presence;
use NjoguAmos\Waha\Dto\SessionData;
use NjoguAmos\Waha\Dto\SessionMeData;
use NjoguAmos\Waha\Enums\SessionStatus;
use NjoguAmos\Waha\Dto\SessionConfigData;
use NjoguAmos\Waha\Dto\SessionEngineData;

it(description: 'can be created from array and converted to array', closure: function () {
    $data = [
        'name'   => 'default',
        'status' => 'WORKING',
        'config' => [
            'webhooks' => [],
            'debug'    => false,
            'metadata' => [],
        ],
        'me' => [
            'id'       => '79111111@c.us',
            'pushName' => 'WAHA',
        ],
        'engine' => [
            'engine' => 'NOWEB',
        ],
        'presence' => 'offline',
    ];

    $dto = SessionData::fromArray($data);

    expect(value: $dto)->toBeInstanceOf(class: SessionData::class)
        ->and(value: $dto->name)->toBe(expected: 'default')
        ->and(value: $dto->status)->toBe(expected: SessionStatus::WORKING)
        ->and(value: $dto->presence)->toBe(expected: Presence::OFFLINE)
        ->and(value: $dto->config)->toBeInstanceOf(class: SessionConfigData::class)
        ->and(value: $dto->me)->toBeInstanceOf(class: SessionMeData::class)
        ->and(value: $dto->engine)->toBeInstanceOf(class: SessionEngineData::class);

    expect(value: $dto->toArray())->toBe(expected: $data);
});

it(description: 'can handle null values for optional components', closure: function () {
    $data = [
        'name'   => 'default',
        'status' => 'WORKING',
        'config' => null,
        'me'     => null,
        'engine' => null,
    ];

    $dto = SessionData::fromArray($data);

    expect(value: $dto->config)->toBeNull()
        ->and(value: $dto->me)->toBeNull()
        ->and(value: $dto->engine)->toBeNull();

    expect(value: $dto->toArray())->toBe(expected: $data);
});

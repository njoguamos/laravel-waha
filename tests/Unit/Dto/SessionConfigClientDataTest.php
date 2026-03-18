<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SessionConfigClientData;

it(description: 'can be created from array and converted to array', closure: function () {
    $data = [
        'deviceName'  => 'TEST',
        'browserName' => 'Chrome',
    ];

    $dto = SessionConfigClientData::fromArray($data);

    expect(value: $dto)->toBeInstanceOf(class: SessionConfigClientData::class)
        ->and(value: $dto->deviceName)->toBe(expected: 'TEST')
        ->and(value: $dto->browserName)->toBe(expected: 'Chrome');

    expect(value: $dto->toArray())->toBe(expected: $data);
});

it(description: 'can be created with null values', closure: function () {
    $data = [];

    $dto = SessionConfigClientData::fromArray($data);

    expect(value: $dto)->toBeInstanceOf(class: SessionConfigClientData::class)
        ->and(value: $dto->deviceName)->toBeNull()
        ->and(value: $dto->browserName)->toBeNull();

    expect(value: $dto->toArray())->toBe(expected: $data);
});

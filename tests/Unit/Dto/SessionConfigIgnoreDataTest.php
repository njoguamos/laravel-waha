<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SessionConfigIgnoreData;

it(description: 'can be created from array and converted to array', closure: function () {
    $data = [
        'status'   => true,
        'groups'   => true,
        'channels' => true,
    ];

    $dto = SessionConfigIgnoreData::fromArray($data);

    expect(value: $dto)->toBeInstanceOf(class: SessionConfigIgnoreData::class)
        ->and(value: $dto->status)->toBeTrue()
        ->and(value: $dto->groups)->toBeTrue()
        ->and(value: $dto->channels)->toBeTrue();

    expect(value: $dto->toArray())->toBe(expected: $data);
});

it(description: 'can be created with default values', closure: function () {
    $data = [];

    $dto = SessionConfigIgnoreData::fromArray($data);

    expect(value: $dto)->toBeInstanceOf(class: SessionConfigIgnoreData::class)
        ->and(value: $dto->status)->toBeFalse()
        ->and(value: $dto->groups)->toBeFalse()
        ->and(value: $dto->channels)->toBeFalse();

    expect(value: $dto->toArray())->toBe(expected: [
        'status'   => false,
        'groups'   => false,
        'channels' => false,
    ]);
});

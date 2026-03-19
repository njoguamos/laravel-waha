<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SessionConfigNowebData;

it(description: 'can be created from array and converted to array', closure: function () {
    $data = [
        'store' => [
            'enabled'  => true,
            'fullSync' => false,
        ],
    ];

    $dto = SessionConfigNowebData::fromArray($data);

    expect(value: $dto)->toBeInstanceOf(class: SessionConfigNowebData::class)
        ->and(value: $dto->enabled)->toBeTrue()
        ->and(value: $dto->fullSync)->toBeFalse();

    expect(value: $dto->toArray())->toBe(expected: $data);
});

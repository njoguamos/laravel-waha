<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SessionMeData;

it(description: 'can be created from array and converted to array', closure: function () {
    $data = [
        'id'       => '79111111@c.us',
        'pushName' => 'WAHA',
    ];

    $dto = SessionMeData::fromArray($data);

    expect(value: $dto)->toBeInstanceOf(class: SessionMeData::class)
        ->and(value: $dto->id)->toBe(expected: '79111111@c.us')
        ->and(value: $dto->pushName)->toBe(expected: 'WAHA');

    expect(value: $dto->toArray())->toBe(expected: $data);
});

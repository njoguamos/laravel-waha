<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SessionConfigWebjsData;

it(description: 'can be created from array and converted to array', closure: function () {
    $data = [
        'tagsEventsOn' => false,
    ];

    $dto = SessionConfigWebjsData::fromArray($data);

    expect(value: $dto)->toBeInstanceOf(class: SessionConfigWebjsData::class)
        ->and(value: $dto->tagsEventsOn)->toBeFalse();

    expect(value: $dto->toArray())->toBe(expected: $data);
});

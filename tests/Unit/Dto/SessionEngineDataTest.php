<?php

declare(strict_types=1);

use NjoguAmos\Waha\Enums\Engine;
use NjoguAmos\Waha\Dto\SessionEngineData;

it(description: 'can be created from array and converted to array', closure: function () {
    $data = [
        'engine' => 'NOWEB',
    ];

    $dto = SessionEngineData::fromArray($data);

    expect(value: $dto)->toBeInstanceOf(class: SessionEngineData::class)
        ->and(value: $dto->engine)->toBe(expected: Engine::NOWEB);

    expect(value: $dto->toArray())->toBe(expected: $data);
});

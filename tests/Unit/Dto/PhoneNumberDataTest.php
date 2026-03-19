<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\PhoneNumberData;

test(description: 'phone number data dto', closure: function () {
    $data = [
        'lid' => '123123123@lid',
        'pn'  => '123456789@c.us',
    ];

    $dto = PhoneNumberData::fromArray(data: $data);

    expect(value: $dto->lid)->toBe(expected: '123123123@lid')
        ->and(value: $dto->pn)->toBe(expected: '123456789@c.us')
        ->and(value: $dto->toArray())->toBe(expected: $data);
});

test(description: 'phone number data dto with null pn', closure: function () {
    $data = [
        'lid' => '123123123@lid',
        'pn'  => null,
    ];

    $dto = PhoneNumberData::fromArray(data: $data);

    expect(value: $dto->lid)->toBe(expected: '123123123@lid')
        ->and(value: $dto->pn)->toBeNull()
        ->and(value: $dto->toArray())->toBe(expected: $data);
});

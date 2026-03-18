<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SessionProxyData;

it(description: 'can be created from array and converted to array', closure: function () {
    $data = [
        'server'   => 'localhost:3128',
        'username' => 'username',
        'password' => 'P@ssw0rd',
    ];

    $dto = SessionProxyData::fromArray($data);

    expect(value: $dto)->toBeInstanceOf(class: SessionProxyData::class)
        ->and(value: $dto->server)->toBe(expected: 'localhost:3128')
        ->and(value: $dto->username)->toBe(expected: 'username')
        ->and(value: $dto->password)->toBe(expected: 'P@ssw0rd');

    expect(value: $dto->toArray())->toBe(expected: $data);
});

<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\ContactUpdateData;

test('contact update data can be created', function () {
    $data = new ContactUpdateData(
        firstName: 'John',
        lastName:  'Doe',
    );

    expect($data->firstName)->toBe('John')
        ->and($data->lastName)->toBe('Doe');
});

test('contact update data to array', function () {
    $data = new ContactUpdateData(
        firstName: 'John',
        lastName:  'Doe',
    );

    expect($data->toArray())->toBe([
        'firstName' => 'John',
        'lastName'  => 'Doe',
    ]);
});

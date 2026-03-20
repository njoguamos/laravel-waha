<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\LidData;

test('lid data can be created from array', function () {
    $data = LidData::fromArray([
        'lid' => '123456789',
        'pn'  => '+1234567890',
    ]);

    expect($data->lid)->toBe('123456789')
        ->and($data->pn)->toBe('+1234567890');
});

test('lid data lid can be null in fromArray', function () {
    $data = LidData::fromArray([
        'lid' => null,
        'pn'  => '+1234567890',
    ]);

    expect($data->lid)->toBeNull()
        ->and($data->pn)->toBe('+1234567890');
});

test('lid data to array', function () {
    $data = new LidData(
        lid: '123456789',
        pn: '+1234567890',
    );

    expect($data->toArray())->toBe([
        'lid' => '123456789',
        'pn'  => '+1234567890',
    ]);
});

test('lid data to array with null lid', function () {
    $data = new LidData(
        lid: null,
        pn: '+1234567890',
    );

    expect($data->toArray())->toBe([
        'lid' => null,
        'pn'  => '+1234567890',
    ]);
});

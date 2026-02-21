<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\TextStatusData;

test(description: 'it can create text status data from array', closure: function () {
    $data = [
        'text'            => 'Hello World',
        'backgroundColor' => '#38b42f',
        'font'            => 1,
        'contacts'        => ['55xxxxxxxxxxx@c.us'],
    ];

    $statusData = TextStatusData::fromArray(data: $data);

    expect(value: $statusData->text)->toBe(expected: 'Hello World')
        ->and(value: $statusData->backgroundColor)->toBe(expected: '#38b42f')
        ->and(value: $statusData->font)->toBe(expected: 1)
        ->and(value: $statusData->contacts)->toBe(expected: ['55xxxxxxxxxxx@c.us']);
});

test(description: 'it can convert text status data to array', closure: function () {
    $statusData = new TextStatusData(
        text: 'Hello World',
        backgroundColor: '#38b42f',
        font: 1,
        contacts: ['55xxxxxxxxxxx@c.us']
    );

    $array = $statusData->toArray();

    expect(value: $array)->toBe(expected: [
        'text'            => 'Hello World',
        'backgroundColor' => '#38b42f',
        'font'            => 1,
        'contacts'        => ['55xxxxxxxxxxx@c.us'],
    ]);
});

test(description: 'it handles optional contacts', closure: function () {
    $statusData = new TextStatusData(
        text: 'Hello World',
        backgroundColor: '#38b42f',
        font: 1
    );

    $array = $statusData->toArray();

    expect(value: $array)->not->toHaveKey(key: 'contacts');
});

<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SessionWebhookCustomHeaderData;

test('session webhook custom header data can be created from array', function () {
    $data = SessionWebhookCustomHeaderData::fromArray([
        'name'  => 'X-Custom-Header',
        'value' => 'custom-value',
    ]);

    expect($data->name)->toBe('X-Custom-Header')
        ->and($data->value)->toBe('custom-value');
});

test('session webhook custom header data to array', function () {
    $data = new SessionWebhookCustomHeaderData(
        name: 'X-Custom-Header',
        value: 'custom-value',
    );

    expect($data->toArray())->toBe([
        'name'  => 'X-Custom-Header',
        'value' => 'custom-value',
    ]);
});

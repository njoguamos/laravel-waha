<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SessionWebhookHmacData;

test('session webhook hmac data can be created from array', function () {
    $data = SessionWebhookHmacData::fromArray([
        'key' => 'secret-hmac-key',
    ]);

    expect($data->key)->toBe('secret-hmac-key');
});

test('session webhook hmac data to array', function () {
    $data = new SessionWebhookHmacData(key: 'secret-hmac-key');

    expect($data->toArray())->toBe([
        'key' => 'secret-hmac-key',
    ]);
});

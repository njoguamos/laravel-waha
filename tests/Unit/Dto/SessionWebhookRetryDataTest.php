<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SessionWebhookRetryData;

test('session webhook retry data can be created from array', function () {
    $data = SessionWebhookRetryData::fromArray([
        'policy'       => 'concurrent',
        'delaySeconds' => 5,
        'attempts'     => 3,
    ]);

    expect($data->policy)->toBe('concurrent')
        ->and($data->delaySeconds)->toBe(5)
        ->and($data->attempts)->toBe(3);
});

test('session webhook retry data to array', function () {
    $data = new SessionWebhookRetryData(
        policy: 'concurrent',
        delaySeconds: 5,
        attempts: 3,
    );

    expect($data->toArray())->toBe([
        'policy'       => 'concurrent',
        'delaySeconds' => 5,
        'attempts'     => 3,
    ]);
});

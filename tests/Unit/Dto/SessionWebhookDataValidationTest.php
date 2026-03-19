<?php

declare(strict_types=1);

use InvalidArgumentException;
use NjoguAmos\Waha\Dto\SessionWebhookData;
use NjoguAmos\Waha\Dto\SessionWebhookHmacData;
use NjoguAmos\Waha\Dto\SessionWebhookRetryData;

it(description: 'throws exception when hmac is missing key in fromArray', closure: function () {
    $data = [
        'url'    => 'https://example.com',
        'events' => ['message'],
        'hmac'   => [
            'wrong_key' => 'secret',
        ],
    ];

    SessionWebhookData::fromArray($data);
})->throws(exception: InvalidArgumentException::class, exceptionMessage: 'The [hmac] must be an array and contain [key].');

it(description: 'throws exception when retries is missing keys in fromArray', closure: function () {
    $data = [
        'url'     => 'https://example.com',
        'events'  => ['message'],
        'retries' => [
            'policy' => 'constant',
            // missing delaySeconds and attempts
        ],
    ];

    SessionWebhookData::fromArray($data);
})->throws(exception: InvalidArgumentException::class, exceptionMessage: 'The [retries] must be an array and contain [policy, delaySeconds, attempts].');

it(description: 'throws exception when customHeaders is not an array of arrays', closure: function () {
    $data = [
        'url'           => 'https://example.com',
        'events'        => ['message'],
        'customHeaders' => [
            'not-an-array'
        ],
    ];

    SessionWebhookData::fromArray($data);
})->throws(exception: InvalidArgumentException::class, exceptionMessage: 'The [customHeaders] must be an indexed array of associative arrays.');

it(description: 'throws exception when customHeaders element is missing name or value', closure: function () {
    $data = [
        'url'           => 'https://example.com',
        'events'        => ['message'],
        'customHeaders' => [
            ['name' => 'X-Header'] // missing value
        ],
    ];

    SessionWebhookData::fromArray($data);
})->throws(exception: InvalidArgumentException::class, exceptionMessage: 'Each item in [customHeaders] must be an array and contain [name, value].');

it(description: 'can be instantiated with array for hmac and retries (backward compatibility)', closure: function () {
    $hmac = ['key' => 'secret'];
    $retries = [
        'policy'       => 'constant',
        'delaySeconds' => 2,
        'attempts'     => 15,
    ];

    $dto = new SessionWebhookData(
        url: 'https://example.com',
        events: ['message'],
        hmac: $hmac,
        retries: $retries
    );

    expect(value: $dto->hmac)->toBeInstanceOf(class: SessionWebhookHmacData::class)
        ->and(value: $dto->hmac->key)->toBe(expected: 'secret')
        ->and(value: $dto->retries)->toBeInstanceOf(class: SessionWebhookRetryData::class)
        ->and(value: $dto->retries->policy)->toBe(expected: 'constant');
});

it(description: 'can be instantiated with scalar values for hmac and retries', closure: function () {
    $dto = new SessionWebhookData(
        url: 'https://example.com',
        events: ['message'],
        hmac: 'secret-key',
        retries: 5
    );

    expect(value: $dto->hmac)->toBeInstanceOf(class: SessionWebhookHmacData::class)
        ->and(value: $dto->hmac->key)->toBe(expected: 'secret-key')
        ->and(value: $dto->retries)->toBeInstanceOf(class: SessionWebhookRetryData::class)
        ->and(value: $dto->retries->attempts)->toBe(expected: 5)
        ->and(value: $dto->retries->policy)->toBe(expected: 'constant')
        ->and(value: $dto->retries->delaySeconds)->toBe(expected: 2);
});

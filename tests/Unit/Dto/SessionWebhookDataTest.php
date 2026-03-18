<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SessionWebhookData;
use NjoguAmos\Waha\Dto\SessionWebhookHmacData;
use NjoguAmos\Waha\Dto\SessionWebhookRetryData;
use NjoguAmos\Waha\Dto\SessionWebhookCustomHeaderData;

it(description: 'can be created from array and converted to array', closure: function () {
    $data = [
        'url'    => 'https://webhook.site/11111111-1111-1111-1111-11111111',
        'events' => ['message', 'session.status'],
        'hmac'   => [
            'key' => 'secret',
        ],
        'retries' => [
            'policy'       => 'constant',
            'delaySeconds' => 2,
            'attempts'     => 15,
        ],
        'customHeaders' => [
            [
                'name'  => 'X-Header',
                'value' => 'value',
            ],
        ],
    ];

    $dto = SessionWebhookData::fromArray($data);

    expect(value: $dto)->toBeInstanceOf(class: SessionWebhookData::class)
        ->and(value: $dto->url)->toBe(expected: 'https://webhook.site/11111111-1111-1111-1111-11111111')
        ->and(value: $dto->events)->toBe(expected: ['message', 'session.status'])
        ->and(value: $dto->hmac)->toBeInstanceOf(class: SessionWebhookHmacData::class)
        ->and(value: $dto->hmac->key)->toBe(expected: 'secret')
        ->and(value: $dto->retries)->toBeInstanceOf(class: SessionWebhookRetryData::class)
        ->and(value: $dto->retries->policy)->toBe(expected: 'constant')
        ->and(value: $dto->retries->delaySeconds)->toBe(expected: 2)
        ->and(value: $dto->retries->attempts)->toBe(expected: 15)
        ->and(value: $dto->customHeaders)->toBeArray()
        ->and(value: $dto->customHeaders[0])->toBeInstanceOf(class: SessionWebhookCustomHeaderData::class)
        ->and(value: $dto->customHeaders[0]->name)->toBe(expected: 'X-Header')
        ->and(value: $dto->customHeaders[0]->value)->toBe(expected: 'value');

    expect(value: $dto->toArray())->toBe(expected: $data);
});

it(description: 'can handle optional fields in fromArray', closure: function () {
    $data = [
        'url'    => 'https://webhook.site/11111111-1111-1111-1111-11111111',
        'events' => ['message'],
    ];

    $dto = SessionWebhookData::fromArray($data);

    expect(value: $dto->hmac)->toBeNull()
        ->and(value: $dto->retries)->toBeNull()
        ->and(value: $dto->customHeaders)->toBeNull();

    expect(value: $dto->toArray())->toBe(expected: [
        'url'           => 'https://webhook.site/11111111-1111-1111-1111-11111111',
        'events'        => ['message'],
        'hmac'          => null,
        'retries'       => null,
        'customHeaders' => null,
    ]);
});

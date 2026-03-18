<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SessionWebhookData;

it(description: 'can be created from array and converted to array', closure: function () {
    $data = [
        'url'           => 'https://webhook.site/11111111-1111-1111-1111-11111111',
        'events'        => ['message', 'session.status'],
        'hmac'          => 'secret',
        'retries'       => 3,
        'customHeaders' => ['X-Header' => 'value'],
    ];

    $dto = SessionWebhookData::fromArray($data);

    expect(value: $dto)->toBeInstanceOf(class: SessionWebhookData::class)
        ->and(value: $dto->url)->toBe(expected: 'https://webhook.site/11111111-1111-1111-1111-11111111')
        ->and(value: $dto->events)->toBe(expected: ['message', 'session.status'])
        ->and(value: $dto->hmac)->toBe(expected: 'secret')
        ->and(value: $dto->retries)->toBe(expected: 3)
        ->and(value: $dto->customHeaders)->toBe(expected: ['X-Header' => 'value']);

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

<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SessionProxyData;
use NjoguAmos\Waha\Dto\SessionConfigData;
use NjoguAmos\Waha\Dto\SessionWebhookData;

it(description: 'can be created from array and converted to array', closure: function () {
    $data = [
        'proxy' => [
            'server'   => 'localhost:3128',
            'username' => 'username',
            'password' => 'P@ssw0rd',
        ],
        'webhooks' => [
            [
                'url'           => 'https://webhook.site/11111111',
                'events'        => ['message'],
                'hmac'          => null,
                'retries'       => null,
                'customHeaders' => null,
            ],
        ],
        'debug' => true,
    ];

    $dto = SessionConfigData::fromArray($data);

    expect(value: $dto)->toBeInstanceOf(class: SessionConfigData::class)
        ->and(value: $dto->proxy)->toBeInstanceOf(class: SessionProxyData::class)
        ->and(value: $dto->webhooks[0])->toBeInstanceOf(class: SessionWebhookData::class)
        ->and(value: $dto->debug)->toBeTrue();

    expect(value: $dto->toArray())->toBe(expected: $data);
});

it(description: 'can handle null values in fromArray', closure: function () {
    $data = [
        'proxy'    => null,
        'webhooks' => [],
        'debug'    => false,
    ];

    $dto = SessionConfigData::fromArray($data);

    expect(value: $dto->proxy)->toBeNull()
        ->and(value: $dto->webhooks)->toBe(expected: []);

    expect(value: $dto->toArray())->toBe(expected: $data);
});

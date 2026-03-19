<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SessionProxyData;
use NjoguAmos\Waha\Dto\SessionConfigData;
use NjoguAmos\Waha\Dto\SessionWebhookData;
use NjoguAmos\Waha\Dto\SessionConfigNowebData;
use NjoguAmos\Waha\Dto\SessionConfigWebjsData;
use NjoguAmos\Waha\Dto\SessionConfigClientData;
use NjoguAmos\Waha\Dto\SessionConfigIgnoreData;

it(description: 'can be created from array and converted to array', closure: function () {
    $data = [
        'webhooks' => [
            [
                'url'           => 'https://webhook.site/11111111',
                'events'        => ['message'],
                'hmac'          => null,
                'retries'       => null,
                'customHeaders' => null,
            ],
        ],
        'debug'    => true,
        'metadata' => [
            'user.id'    => '123',
            'user.email' => 'email@example.com',
        ],
        'proxy' => [
            'server'   => 'localhost:3128',
            'username' => 'username',
            'password' => 'P@ssw0rd',
        ],
        'noweb' => [
            'store' => [
                'enabled'  => true,
                'fullSync' => false,
            ],
        ],
        'webjs' => [
            'tagsEventsOn' => false,
        ],
        'client' => [
            'deviceName'  => 'TEST',
            'browserName' => 'Chrome',
        ],
        'ignore' => [
            'status'   => false,
            'groups'   => false,
            'channels' => false,
        ],
    ];

    $dto = SessionConfigData::fromArray($data);

    expect(value: $dto)->toBeInstanceOf(class: SessionConfigData::class)
        ->and(value: $dto->proxy)->toBeInstanceOf(class: SessionProxyData::class)
        ->and(value: $dto->webhooks[0])->toBeInstanceOf(class: SessionWebhookData::class)
        ->and(value: $dto->debug)->toBeTrue()
        ->and(value: $dto->noweb)->toBeInstanceOf(class: SessionConfigNowebData::class)
        ->and(value: $dto->webjs)->toBeInstanceOf(class: SessionConfigWebjsData::class)
        ->and(value: $dto->client)->toBeInstanceOf(class: SessionConfigClientData::class)
        ->and(value: $dto->ignore)->toBeInstanceOf(class: SessionConfigIgnoreData::class)
        ->and(value: $dto->metadata)->toBe(expected: [
            'user.id'    => '123',
            'user.email' => 'email@example.com',
        ]);

    expect(value: $dto->toArray())->toBe(expected: $data);
});

it(description: 'can handle null values in fromArray', closure: function () {
    $data = [
        'webhooks' => [],
        'debug'    => false,
        'metadata' => [],
    ];

    $dto = SessionConfigData::fromArray($data);

    expect(value: $dto->proxy)->toBeNull()
        ->and(value: $dto->webhooks)->toBe(expected: [])
        ->and(value: $dto->noweb)->toBeNull()
        ->and(value: $dto->webjs)->toBeNull()
        ->and(value: $dto->client)->toBeNull()
        ->and(value: $dto->ignore)->toBeNull()
        ->and(value: $dto->metadata)->toBe(expected: []);

    expect(value: $dto->toArray())->toBe(expected: $data);
});

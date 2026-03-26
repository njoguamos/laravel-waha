<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use NjoguAmos\Waha\Dto\PresenceData;
use NjoguAmos\Waha\Facades\Presence;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Enums\Presence as PresenceEnum;
use NjoguAmos\Waha\Requests\Presence\SetPresenceRequest;
use NjoguAmos\Waha\Requests\Presence\GetAllPresenceRequest;
use NjoguAmos\Waha\Requests\Presence\GetChatPresenceRequest;
use NjoguAmos\Waha\Requests\Presence\SubscribePresenceRequest;

test('presence set can be sent', function () {
    $mockClient = MockClient::global([
        SetPresenceRequest::class => MockResponse::make(),
    ]);

    $data = new PresenceData(
        presence: PresenceEnum::ONLINE,
    );

    $response = Presence::set(data: $data);

    expect($response->ok())->toBeTrue();

    $mockClient->assertSent(function (SetPresenceRequest $request) {
        return $request->resolveEndpoint() === '/api/default/presence';
    });
});

test('presence set can be sent with custom session', function () {
    $mockClient = MockClient::global([
        SetPresenceRequest::class => MockResponse::make(),
    ]);

    $data = new PresenceData(
        presence: PresenceEnum::TYPING,
        chatId: '1234567890@c.us',
    );

    $response = Presence::set(data: $data, session: 'custom');

    expect($response->ok())->toBeTrue();

    $mockClient->assertSent(function (SetPresenceRequest $request) {
        return $request->resolveEndpoint() === '/api/custom/presence'
            && $request->body()->all() === [
                'presence' => 'typing',
                'chatId'   => '1234567890@c.us',
            ];
    });
});

test('presence set encodes session name', function () {
    $mockClient = MockClient::global([
        SetPresenceRequest::class => MockResponse::make(),
    ]);

    $data = new PresenceData(
        presence: PresenceEnum::OFFLINE,
    );

    Presence::set(data: $data, session: 'session 1');

    $mockClient->assertSent(function (SetPresenceRequest $request) {
        return $request->resolveEndpoint() === '/api/session%201/presence';
    });
});

test('can get chat presence', function () {
    $mockClient = MockClient::global([
        GetChatPresenceRequest::class => MockResponse::make([
            'id'        => '1234567890@c.us',
            'presences' => [
                [
                    'participant'       => '1234567890@c.us',
                    'lastKnownPresence' => 'online',
                    'lastSeen'          => null,
                ],
            ],
        ]),
    ]);

    $response = Presence::get(chatId: '1234567890@c.us');

    expect($response->ok())->toBeTrue();

    $dto = $response->dtoOrFail();
    expect($dto->id)->toBe('1234567890@c.us')
        ->and($dto->presences[0]->lastKnownPresence)->toBe('online');

    $mockClient->assertSent(function (GetChatPresenceRequest $request) {
        return $request->resolveEndpoint() === '/api/default/presence/1234567890%40c.us';
    });
});

test('can get chat presence with custom session', function () {
    $mockClient = MockClient::global([
        GetChatPresenceRequest::class => MockResponse::make([
            'id'        => '1234567890@c.us',
            'presences' => [],
        ]),
    ]);

    Presence::get(chatId: '1234567890@c.us', session: 'custom');

    $mockClient->assertSent(function (GetChatPresenceRequest $request) {
        return $request->resolveEndpoint() === '/api/custom/presence/1234567890%40c.us';
    });
});

test('can subscribe to chat presence', function () {
    $mockClient = MockClient::global([
        SubscribePresenceRequest::class => MockResponse::make(),
    ]);

    $response = Presence::subscribe(chatId: '1234567890@c.us');

    expect($response->ok())->toBeTrue();

    $mockClient->assertSent(function (SubscribePresenceRequest $request) {
        return $request->resolveEndpoint() === '/api/default/presence/1234567890%40c.us/subscribe';
    });
});

test('can subscribe to chat presence with custom session', function () {
    $mockClient = MockClient::global([
        SubscribePresenceRequest::class => MockResponse::make(),
    ]);

    Presence::subscribe(chatId: '1234567890@c.us', session: 'custom');

    $mockClient->assertSent(function (SubscribePresenceRequest $request) {
        return $request->resolveEndpoint() === '/api/custom/presence/1234567890%40c.us/subscribe';
    });
});

test('can get all presences', function () {
    $mockClient = MockClient::global([
        GetAllPresenceRequest::class => MockResponse::make([
            [
                'id'        => '1234567890@c.us',
                'presences' => [
                    [
                        'participant'       => '1234567890@c.us',
                        'lastKnownPresence' => 'offline',
                        'lastSeen'          => 1686719326,
                    ],
                ],
            ],
        ]),
    ]);

    $response = Presence::all();

    expect($response->ok())->toBeTrue();

    $dto = $response->dtoOrFail();
    expect($dto)->toHaveCount(1)
        ->and($dto[0]->id)->toBe('1234567890@c.us');

    $mockClient->assertSent(function (GetAllPresenceRequest $request) {
        return $request->resolveEndpoint() === '/api/default/presence';
    });
});

test('can get all presences with custom session', function () {
    $mockClient = MockClient::global([
        GetAllPresenceRequest::class => MockResponse::make([]),
    ]);

    Presence::all(session: 'custom');

    $mockClient->assertSent(function (GetAllPresenceRequest $request) {
        return $request->resolveEndpoint() === '/api/custom/presence';
    });
});

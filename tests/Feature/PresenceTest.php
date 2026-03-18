<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use NjoguAmos\Waha\Dto\PresenceData;
use NjoguAmos\Waha\Facades\Presence;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Enums\Presence as PresenceEnum;
use NjoguAmos\Waha\Requests\Presence\SetPresenceRequest;

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

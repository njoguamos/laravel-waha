<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SeenData;
use NjoguAmos\Waha\Enums\Presence;
use Saloon\Http\Faking\MockClient;
use NjoguAmos\Waha\Facades\Message;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Dto\MessageTextData;
use NjoguAmos\Waha\Requests\Message\SendSeenRequest;
use NjoguAmos\Waha\Requests\Message\SendTextRequest;
use NjoguAmos\Waha\Requests\Presence\SetPresenceRequest;

describe(description: 'send text message', tests: function () {
    it(description: 'can send text message', closure: function () {
        MockClient::global(mockData: [
            SendTextRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new MessageTextData(
            chatId: '123456789@c.us',
            text: 'The only way to do great work is to love what you do.'
        );

        $result = Message::sendText(data: $data);

        expect(value: $result->status())->toBe(expected: 201);
    });

    it(description: 'can send text message with explicit session', closure: function () {
        MockClient::global(mockData: [
            SendTextRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new MessageTextData(
            chatId: '123456789@c.us',
            text: 'The only way to do great work is to love what you do.'
        );

        $result = Message::sendText(data: $data, session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (SendTextRequest $request): bool {
            return $request->resolveEndpoint() === '/api/custom-session/sendText';
        });
    });

    it(description: 'uses default session from config when session is null', closure: function () {
        config()->set(key: 'waha.session', value: 'test-session');

        MockClient::global(mockData: [
            SendTextRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new MessageTextData(
            chatId: '123456789@c.us',
            text: 'The only way to do great work is to love what you do.'
        );

        $result = Message::sendText(data: $data);

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (SendTextRequest $request): bool {
            return $request->resolveEndpoint() === '/api/test-session/sendText';
        });
    });

    it(description: 'sends presence status before sending text message when enabled', closure: function () {
        config()->set(key: 'waha.send_typing_status', value: true);

        MockClient::global(mockData: [
            SetPresenceRequest::class => MockResponse::make(body: [], status: 200),
            SendTextRequest::class    => MockResponse::make(body: [], status: 201)
        ]);

        $data = new MessageTextData(
            chatId: '123456789@c.us',
            text: 'Natural human behavior.'
        );

        $result = Message::sendText(data: $data);

        expect(value: $result->status())->toBe(expected: 201);

        // Verify the sequence of requests
        $sentRequests = MockClient::global()->getRecordedResponses();

        expect($sentRequests)->toHaveCount(4);

        // 1. Online
        expect($sentRequests[0]->getRequest())->toBeInstanceOf(SetPresenceRequest::class);
        expect($sentRequests[0]->getRequest()->body()->all())->toBe(['presence' => Presence::ONLINE->value]);

        // 2. Typing
        expect($sentRequests[1]->getRequest())->toBeInstanceOf(SetPresenceRequest::class);
        expect($sentRequests[1]->getRequest()->body()->all())->toBe([
            'presence' => Presence::TYPING->value,
            'chatId'   => '123456789@c.us'
        ]);

        // 3. Paused
        expect($sentRequests[2]->getRequest())->toBeInstanceOf(SetPresenceRequest::class);
        expect($sentRequests[2]->getRequest()->body()->all())->toBe([
            'presence' => Presence::PAUSED->value,
            'chatId'   => '123456789@c.us'
        ]);

        // 4. Send Text
        expect($sentRequests[3]->getRequest())->toBeInstanceOf(SendTextRequest::class);
    });
});

describe(description: 'send seen', tests: function () {
    it(description: 'can send seen', closure: function () {
        MockClient::global(mockData: [
            SendSeenRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new SeenData(
            chatId: '123456789@c.us',
        );

        $result = Message::sendSeen(data: $data);

        expect(value: $result->status())->toBe(expected: 201);
    });

    it(description: 'can send seen with explicit session', closure: function () {
        MockClient::global(mockData: [
            SendSeenRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new SeenData(
            chatId: '123456789@c.us',
        );

        $result = Message::sendSeen(data: $data, session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (SendSeenRequest $request): bool {
            return $request->resolveEndpoint() === '/api/custom-session/sendSeen';
        });
    });

    it(description: 'uses default session from config when session is null', closure: function () {
        config()->set(key: 'waha.session', value: 'test-session');

        MockClient::global(mockData: [
            SendSeenRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new SeenData(
            chatId: '123456789@c.us',
        );

        $result = Message::sendSeen(data: $data);

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (SendSeenRequest $request): bool {
            return $request->resolveEndpoint() === '/api/test-session/sendSeen';
        });
    });
});

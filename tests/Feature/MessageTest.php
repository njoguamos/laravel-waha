<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use NjoguAmos\Waha\Dto\SeenData;
use NjoguAmos\Waha\Facades\Message;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Dto\MessageTextData;
use NjoguAmos\Waha\Requests\Message\SendSeenRequest;
use NjoguAmos\Waha\Requests\Message\SendTextRequest;

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

<?php

declare(strict_types=1);

use NjoguAmos\Waha\Facades\Chat;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Dto\ChatRequestData;
use NjoguAmos\Waha\Dto\MessageUpdateData;
use NjoguAmos\Waha\Requests\Chat\StopTypingRequest;
use NjoguAmos\Waha\Requests\Chat\StartTypingRequest;
use NjoguAmos\Waha\Requests\Chat\DeleteMessageRequest;
use NjoguAmos\Waha\Requests\Chat\UpdateMessageRequest;

describe(description: 'chat management', tests: function () {
    it(description: 'can start typing', closure: function () {
        MockClient::global(mockData: [
            StartTypingRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new ChatRequestData(chatId: '123456789@c.us');

        $result = Chat::startTyping(data: $data);

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (StartTypingRequest $request): bool {
            return $request->resolveEndpoint() === '/api/default/startTyping'
                && $request->body()->get('chatId') === '123456789@c.us';
        });
    });

    it(description: 'can stop typing', closure: function () {
        MockClient::global(mockData: [
            StopTypingRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new ChatRequestData(chatId: '123456789@c.us');

        $result = Chat::stopTyping(data: $data);

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (StopTypingRequest $request): bool {
            return $request->resolveEndpoint() === '/api/default/stopTyping'
                && $request->body()->get('chatId') === '123456789@c.us';
        });
    });

    it(description: 'can delete message', closure: function () {
        MockClient::global(mockData: [
            DeleteMessageRequest::class => MockResponse::make(body: [], status: 200)
        ]);

        $result = Chat::deleteMessage(chatId: '123456789@c.us', messageId: 'true_123456789@c.us_BAE6A33293978B16');

        expect(value: $result->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (DeleteMessageRequest $request): bool {
            return $request->resolveEndpoint() === '/api/default/chats/123456789%40c.us/messages/true_123456789%40c.us_BAE6A33293978B16';
        });
    });

    it(description: 'can update message', closure: function () {
        MockClient::global(mockData: [
            UpdateMessageRequest::class => MockResponse::make(body: [], status: 200)
        ]);

        $data = new MessageUpdateData(text: 'Updated text');

        $result = Chat::updateMessage(chatId: '123456789@c.us', messageId: 'true_123456789@c.us_BAE6A33293978B16', data: $data);

        expect(value: $result->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (UpdateMessageRequest $request): bool {
            return $request->resolveEndpoint() === '/api/default/chats/123456789%40c.us/messages/true_123456789%40c.us_BAE6A33293978B16'
                && $request->body()->get('text') === 'Updated text';
        });
    });
});

<?php

declare(strict_types=1);

use Illuminate\Support\Sleep;
use NjoguAmos\Waha\Dto\PollData;
use NjoguAmos\Waha\Dto\SeenData;
use NjoguAmos\Waha\Enums\Presence;
use Saloon\Http\Faking\MockClient;
use Illuminate\Support\Facades\Log;
use NjoguAmos\Waha\Facades\Message;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Dto\MessageFileData;
use NjoguAmos\Waha\Dto\MessagePollData;
use NjoguAmos\Waha\Dto\MessageTextData;
use NjoguAmos\Waha\Dto\MessageImageData;
use NjoguAmos\Waha\Dto\MessageVideoData;
use NjoguAmos\Waha\Dto\MessageVoiceData;
use NjoguAmos\Waha\Dto\MessagePollVoteData;
use NjoguAmos\Waha\Requests\Message\SendFileRequest;
use NjoguAmos\Waha\Requests\Message\SendPollRequest;
use NjoguAmos\Waha\Requests\Message\SendSeenRequest;
use NjoguAmos\Waha\Requests\Message\SendTextRequest;
use NjoguAmos\Waha\Requests\Message\SendImageRequest;
use NjoguAmos\Waha\Requests\Message\SendVideoRequest;
use NjoguAmos\Waha\Requests\Message\SendVoiceRequest;
use NjoguAmos\Waha\Requests\Message\SendPollVoteRequest;
use NjoguAmos\Waha\Requests\Presence\SetPresenceRequest;

describe(description: 'send text message', tests: function () {
    it(description: 'can send text message', closure: function () {
        config()->set(key: 'waha.send_typing_status', value: false);

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
            return $request->resolveEndpoint() === '/api/sendText'
                && $request->body()->get('session') === 'default';
        });
    });

    it(description: 'can send text message with explicit session', closure: function () {
        config()->set(key: 'waha.send_typing_status', value: false);

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
            return $request->resolveEndpoint() === '/api/sendText'
                && $request->body()->get('session') === 'custom-session';
        });
    });

    it(description: 'uses default session from config when session is null', closure: function () {
        config()->set(key: 'waha.session', value: 'test-session');
        config()->set(key: 'waha.send_typing_status', value: false);

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
            return $request->resolveEndpoint() === '/api/sendText'
                && $request->body()->get('session') === 'test-session';
        });
    });

    it(description: 'sends presence status before sending text message when enabled', closure: function () {
        Sleep::fake();
        config()->set(key: 'waha.send_typing_status', value: true);

        MockClient::global(mockData: [
            SetPresenceRequest::class => MockResponse::make(body: [], status: 201),
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

    it(description: 'continues sending text message even if presence status fails and logs the error', closure: function () {
        Sleep::fake();
        config()->set(key: 'waha.send_typing_status', value: true);

        Log::shouldReceive('error')
            ->times(3)
            ->withArgs(function ($message, $context) {
                return str_contains($message, 'Internal Server Error')
                    && $context === [
                        'session' => 'default',
                        'chatId'  => '123456789@c.us',
                    ];
            });

        MockClient::global(mockData: [
            SetPresenceRequest::class => MockResponse::make(body: ['error' => 'Internal Server Error'], status: 500),
            SendTextRequest::class    => MockResponse::make(body: [], status: 201)
        ]);

        $data = new MessageTextData(
            chatId: '123456789@c.us',
            text: 'Still sent even if presence fails.'
        );

        $result = Message::sendText(data: $data);

        expect(value: $result->status())->toBe(expected: 201);

        // Verify that SendTextRequest was still sent
        MockClient::global()->assertSent(SendTextRequest::class);
    });
});

describe(description: 'send image message', tests: function () {
    it(description: 'can send image message', closure: function () {
        MockClient::global(mockData: [
            SendImageRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new MessageImageData(
            chatId: '123456789@c.us',
            file: ['url' => 'https://example.com/image.jpg'],
            caption: 'The only way to do great work is to love what you do.'
        );

        $result = Message::sendImage(data: $data);

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (SendImageRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sendImage'
                && $request->body()->get('session') === 'default';
        });
    });
});

describe(description: 'send file message', tests: function () {
    it(description: 'can send file message', closure: function () {
        MockClient::global(mockData: [
            SendFileRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new MessageFileData(
            chatId: '123456789@c.us',
            file: 'https://example.com/document.pdf',
            caption: 'Important document'
        );

        $result = Message::sendFile(data: $data);

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (SendFileRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sendFile'
                && $request->body()->get('session') === 'default';
        });
    });
});

describe(description: 'send video message', tests: function () {
    it(description: 'can send video message', closure: function () {
        MockClient::global(mockData: [
            SendVideoRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new MessageVideoData(
            chatId: '123456789@c.us',
            file: ['url' => 'https://example.com/video.mp4']
        );

        $result = Message::sendVideo(data: $data);

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (SendVideoRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sendVideo'
                && $request->body()->get('session') === 'default'
                && $request->body()->get('convert') === false;
        });
    });
});

describe(description: 'send voice message', tests: function () {
    it(description: 'can send voice message', closure: function () {
        MockClient::global(mockData: [
            SendVoiceRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new MessageVoiceData(
            chatId: '123456789@c.us',
            file: 'https://example.com/voice.opus'
        );

        $result = Message::sendVoice(data: $data);

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (SendVoiceRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sendVoice'
                && $request->body()->get('session') === 'default'
                && $request->body()->get('convert') === false;
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

describe(description: 'send poll', tests: function () {
    it(description: 'can send poll', closure: function () {
        MockClient::global(mockData: [
            SendPollRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new MessagePollData(
            chatId: '123456789@c.us',
            poll: new PollData(
                name: 'How are you?',
                options: ['Awesome!', 'Good!', 'Not bad!'],
            ),
        );

        $result = Message::sendPoll(data: $data);

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (SendPollRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sendPoll'
                && $request->body()->get('session') === 'default';
        });
    });
});

describe(description: 'send poll vote', tests: function () {
    it(description: 'can send poll vote', closure: function () {
        MockClient::global(mockData: [
            SendPollVoteRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new MessagePollVoteData(
            chatId: '123456789@c.us',
            pollMessageId: 'false_123456789@c.us_AAAAAAAAAAAAAAAAAAAA',
            votes: [['Awesome!']],
        );

        $result = Message::sendPollVote(data: $data);

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (SendPollVoteRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sendPollVote'
                && $request->body()->get('session') === 'default';
        });
    });
});

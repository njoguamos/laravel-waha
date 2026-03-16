<?php

declare(strict_types=1);

use NjoguAmos\Waha\Enums\Engine;
use NjoguAmos\Waha\Enums\Version;
use NjoguAmos\Waha\Facades\Status;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Dto\TextStatusData;
use NjoguAmos\Waha\Dto\ImageStatusData;
use NjoguAmos\Waha\Requests\Status\SendTextStatusRequest;
use NjoguAmos\Waha\Requests\Status\SendImageStatusRequest;

describe(description: 'send text status', tests: function () {
    it(description: 'can send text status', closure: function () {
        MockClient::global(mockData: [
            SendTextStatusRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new TextStatusData(text: 'The only way to do great work is to love what you do.');

        $result = Status::sendText(data: $data);

        expect(value: $result->status())->toBe(expected: 201);
    });

    it(description: 'can send text status with explicit session', closure: function () {
        MockClient::global(mockData: [
            SendTextStatusRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new TextStatusData(text: 'The only way to do great work is to love what you do.');

        $result = Status::sendText(data: $data, session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (SendTextStatusRequest $request): bool {
            return $request->resolveEndpoint() === '/api/custom-session/status/text';
        });
    });

    it(description: 'uses default session from config when session is null', closure: function () {
        config()->set(key: 'waha.session', value: 'test-session');

        MockClient::global(mockData: [
            SendTextStatusRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new TextStatusData(text: 'The only way to do great work is to love what you do.');

        $result = Status::sendText(data: $data);

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (SendTextStatusRequest $request): bool {
            return $request->resolveEndpoint() === '/api/test-session/status/text';
        });
    });
});

describe(description: 'send image status', tests: function () {
    it(description: 'can send image status', closure: function () {
        MockClient::global(mockData: [
            SendImageStatusRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new ImageStatusData(
            file: 'https://github.com/devlikeapro/waha/raw/core/examples/dev.likeapro.jpg',
            caption: 'Dev Like A Pro'
        );

        $result = Status::sendImage(data: $data);

        expect(value: $result->status())->toBe(expected: 201);
    });

    it(description: 'can send image status with explicit session', closure: function () {
        MockClient::global(mockData: [
            SendImageStatusRequest::class => MockResponse::make(body: [], status: 201)
        ]);

        $data = new ImageStatusData(
            file: 'https://github.com/devlikeapro/waha/raw/core/examples/dev.likeapro.jpg'
        );

        $result = Status::sendImage(data: $data, session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (SendImageStatusRequest $request): bool {
            return $request->resolveEndpoint() === '/api/custom-session/status/image';
        });
    });

    it(description: 'throws runtime exception when engine is WPP and version is CORE', closure: function () {
        config()->set(key: 'waha.engine', value: Engine::WPP->value);
        config()->set(key: 'waha.version', value: Version::CORE->value);

        $data = new ImageStatusData(
            file: 'https://github.com/devlikeapro/waha/raw/core/examples/dev.likeapro.jpg'
        );

        expect(fn () => Status::sendImage(data: $data))
            ->toThrow(exception: RuntimeException::class, message: 'Send Image Status is not supported on core version using WPP engine');
    });
});

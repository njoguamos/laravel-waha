<?php

declare(strict_types=1);

use NjoguAmos\Waha\Facades\Status;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Dto\TextStatusData;
use NjoguAmos\Waha\Requests\Status\SendTextStatusRequest;

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

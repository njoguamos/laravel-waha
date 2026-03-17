<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use NjoguAmos\Waha\Facades\Session;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Requests\Session\StartSessionRequest;

describe(description: 'start session', tests: function () {
    it(description: 'can start session', closure: function () {
        MockClient::global(mockData: [
            StartSessionRequest::class => MockResponse::make(body: ['name' => 'default', 'status' => 'STARTING'], status: 201)
        ]);

        $result = Session::start();

        expect(value: $result->status())->toBe(expected: 201);
        expect(value: $result->json(key: 'name'))->toBe(expected: 'default');

        MockClient::global()->assertSent(function (StartSessionRequest $request): bool {
            return $request->body()->all() === ['name' => 'default'];
        });
    });

    it(description: 'can start session with explicit session name', closure: function () {
        MockClient::global(mockData: [
            StartSessionRequest::class => MockResponse::make(body: ['name' => 'custom-session', 'status' => 'STARTING'], status: 201)
        ]);

        $result = Session::start(session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 201);
        expect(value: $result->json(key: 'name'))->toBe(expected: 'custom-session');

        MockClient::global()->assertSent(function (StartSessionRequest $request): bool {
            return $request->body()->all() === ['name' => 'custom-session'];
        });
    });

    it(description: 'uses default session from config when session name is not provided', closure: function () {
        config()->set(key: 'waha.session', value: 'test-session');

        MockClient::global(mockData: [
            StartSessionRequest::class => MockResponse::make(body: ['name' => 'test-session', 'status' => 'STARTING'], status: 201)
        ]);

        $result = Session::start();

        expect(value: $result->status())->toBe(expected: 201);
        expect(value: $result->json(key: 'name'))->toBe(expected: 'test-session');

        MockClient::global()->assertSent(function (StartSessionRequest $request): bool {
            return $request->body()->all() === ['name' => 'test-session'];
        });
    });
});

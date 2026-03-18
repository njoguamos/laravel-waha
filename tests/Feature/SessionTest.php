<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use NjoguAmos\Waha\Facades\Session;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Requests\Session\GetSessionRequest;
use NjoguAmos\Waha\Requests\Session\StopSessionRequest;
use NjoguAmos\Waha\Requests\Session\StartSessionRequest;
use NjoguAmos\Waha\Requests\Session\LogoutSessionRequest;
use NjoguAmos\Waha\Requests\Session\RestartSessionRequest;

describe(description: 'get session', tests: function () {
    it(description: 'can get session', closure: function () {
        MockClient::global(mockData: [
            GetSessionRequest::class => MockResponse::make(body: ['name' => 'default', 'status' => 'ONLINE'], status: 200)
        ]);

        $result = Session::get();

        expect(value: $result->status())->toBe(expected: 200)
            ->and(value: $result->json(key: 'name'))->toBe(expected: 'default');

        MockClient::global()->assertSent(function (GetSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/default';
        });
    });

    it(description: 'can get explicit session', closure: function () {
        MockClient::global(mockData: [
            GetSessionRequest::class => MockResponse::make(body: ['name' => 'custom-session', 'status' => 'ONLINE'], status: 200)
        ]);

        $result = Session::get(session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 200)
            ->and(value: $result->json(key: 'name'))->toBe(expected: 'custom-session');

        MockClient::global()->assertSent(function (GetSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/custom-session';
        });
    });
});

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

describe(description: 'logout session', tests: function () {
    it(description: 'can logout session', closure: function () {
        MockClient::global(mockData: [
            LogoutSessionRequest::class => MockResponse::make(body: ['status' => 'OK'], status: 200)
        ]);

        $result = Session::logout();

        expect(value: $result->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (LogoutSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/default/logout';
        });
    });

    it(description: 'can logout explicit session', closure: function () {
        MockClient::global(mockData: [
            LogoutSessionRequest::class => MockResponse::make(body: ['status' => 'OK'], status: 200)
        ]);

        $result = Session::logout(session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (LogoutSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/custom-session/logout';
        });
    });
});

describe(description: 'restart session', tests: function () {
    it(description: 'can restart session', closure: function () {
        MockClient::global(mockData: [
            RestartSessionRequest::class => MockResponse::make(body: ['status' => 'OK'], status: 200)
        ]);

        $result = Session::restart();

        expect(value: $result->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (RestartSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/default/restart';
        });
    });

    it(description: 'can restart explicit session', closure: function () {
        MockClient::global(mockData: [
            RestartSessionRequest::class => MockResponse::make(body: ['status' => 'OK'], status: 200)
        ]);

        $result = Session::restart(session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (RestartSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/custom-session/restart';
        });
    });
});

describe(description: 'stop session', tests: function () {
    it(description: 'can stop session', closure: function () {
        MockClient::global(mockData: [
            StopSessionRequest::class => MockResponse::make(body: ['status' => 'OK'], status: 200)
        ]);

        $result = Session::stop();

        expect(value: $result->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (StopSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/default/stop';
        });
    });

    it(description: 'can stop explicit session', closure: function () {
        MockClient::global(mockData: [
            StopSessionRequest::class => MockResponse::make(body: ['status' => 'OK'], status: 200)
        ]);

        $result = Session::stop(session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (StopSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/custom-session/stop';
        });
    });
});

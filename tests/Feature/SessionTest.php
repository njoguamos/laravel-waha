<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use NjoguAmos\Waha\Dto\SessionData;
use NjoguAmos\Waha\Facades\Session;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Dto\SessionMeData;
use NjoguAmos\Waha\Dto\ScreenshotData;
use NjoguAmos\Waha\Dto\SessionCreateData;
use NjoguAmos\Waha\Dto\SessionUpdateData;
use NjoguAmos\Waha\Requests\Session\GetMeRequest;
use NjoguAmos\Waha\Requests\Session\GetSessionRequest;
use NjoguAmos\Waha\Requests\Session\ScreenshotRequest;
use NjoguAmos\Waha\Requests\Session\StopSessionRequest;
use NjoguAmos\Waha\Requests\Session\ListSessionsRequest;
use NjoguAmos\Waha\Requests\Session\StartSessionRequest;
use NjoguAmos\Waha\Requests\Session\CreateSessionRequest;
use NjoguAmos\Waha\Requests\Session\DeleteSessionRequest;
use NjoguAmos\Waha\Requests\Session\LogoutSessionRequest;
use NjoguAmos\Waha\Requests\Session\UpdateSessionRequest;
use NjoguAmos\Waha\Requests\Session\RestartSessionRequest;

describe(description: 'list sessions', tests: function () {
    it(description: 'can list all sessions', closure: function () {
        MockClient::global(mockData: [
            ListSessionsRequest::class => MockResponse::make(body: [['name' => 'default', 'status' => 'ONLINE']], status: 201)
        ]);

        $result = Session::all();

        expect(value: $result->status())->toBe(expected: 201)
            ->and(value: $result->json())->toBe(expected: [['name' => 'default', 'status' => 'ONLINE']]);

        MockClient::global()->assertSent(function (ListSessionsRequest $request): bool {
            return $request->query()->all() === ['all' => 'true'];
        });
    });

    it(description: 'can return an array of SessionData DTOs', closure: function () {
        $body = [
            [
                'name'   => 'default',
                'status' => 'WORKING',
            ],
        ];

        MockClient::global(mockData: [
            ListSessionsRequest::class => MockResponse::make(body: $body, status: 201),
        ]);

        $sessions = Session::all()->dtoOrFail();

        expect(value: $sessions)->toBeArray()
            ->and(value: $sessions)->toHaveCount(count: 1)
            ->and(value: $sessions[0])->toBeInstanceOf(class: SessionData::class);
    });

    it(description: 'can list only active sessions', closure: function () {
        MockClient::global(mockData: [
            ListSessionsRequest::class => MockResponse::make(body: [['name' => 'default', 'status' => 'ONLINE']], status: 201)
        ]);

        $result = Session::all(all: false);

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (ListSessionsRequest $request): bool {
            return $request->query()->all() === [];
        });
    });
});

describe(description: 'create session', tests: function () {
    it(description: 'can create session', closure: function () {
        MockClient::global(mockData: [
            CreateSessionRequest::class => MockResponse::make(body: ['name' => 'default', 'status' => 'STARTING'], status: 201)
        ]);

        $data = new SessionCreateData(name: 'default');
        $result = Session::create(data: $data);

        expect(value: $result->status())->toBe(expected: 201)
            ->and(value: $result->json(key: 'name'))->toBe(expected: 'default');

        MockClient::global()->assertSent(function (CreateSessionRequest $request): bool {
            return $request->body()->all() === ['name' => 'default', 'start' => true];
        });
    });
});

describe(description: 'update session', tests: function () {
    it(description: 'can update session', closure: function () {
        MockClient::global(mockData: [
            UpdateSessionRequest::class => MockResponse::make(body: ['name' => 'default', 'status' => 'WORKING'], status: 201)
        ]);

        $data = new SessionUpdateData(apps: [['app' => 'calls', 'enabled' => true]]);
        $result = Session::update(data: $data);

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (UpdateSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/default'
                && $request->body()->all() === ['apps' => [['app' => 'calls', 'enabled' => true]]];
        });
    });

    it(description: 'can update explicit session', closure: function () {
        MockClient::global(mockData: [
            UpdateSessionRequest::class => MockResponse::make(body: ['name' => 'custom-session', 'status' => 'WORKING'], status: 201)
        ]);

        $data = new SessionUpdateData(apps: [['app' => 'calls', 'enabled' => true]]);
        $result = Session::update(data: $data, session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (UpdateSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/custom-session'
                && $request->body()->all() === ['apps' => [['app' => 'calls', 'enabled' => true]]];
        });
    });
});

describe(description: 'delete session', tests: function () {
    it(description: 'can delete session', closure: function () {
        MockClient::global(mockData: [
            DeleteSessionRequest::class => MockResponse::make(status: 201)
        ]);

        $result = Session::delete();

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (DeleteSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/default';
        });
    });

    it(description: 'can delete explicit session', closure: function () {
        MockClient::global(mockData: [
            DeleteSessionRequest::class => MockResponse::make(status: 201)
        ]);

        $result = Session::delete(session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (DeleteSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/custom-session';
        });
    });
});

describe(description: 'get session', tests: function () {
    it(description: 'can get session', closure: function () {
        MockClient::global(mockData: [
            GetSessionRequest::class => MockResponse::make(body: ['name' => 'default', 'status' => 'ONLINE'], status: 201)
        ]);

        $result = Session::get();

        expect(value: $result->status())->toBe(expected: 201)
            ->and(value: $result->json(key: 'name'))->toBe(expected: 'default');

        MockClient::global()->assertSent(function (GetSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/default';
        });
    });

    it(description: 'can return SessionData DTO', closure: function () {
        $body = [
            'name'   => 'default',
            'status' => 'WORKING',
        ];

        MockClient::global(mockData: [
            GetSessionRequest::class => MockResponse::make(body: $body, status: 201),
        ]);

        $session = Session::get()->dtoOrFail();

        expect(value: $session)->toBeInstanceOf(class: SessionData::class);
    });

    it(description: 'can get explicit session', closure: function () {
        MockClient::global(mockData: [
            GetSessionRequest::class => MockResponse::make(body: ['name' => 'custom-session', 'status' => 'ONLINE'], status: 201)
        ]);

        $result = Session::get(session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 201)
            ->and(value: $result->json(key: 'name'))->toBe(expected: 'custom-session');

        MockClient::global()->assertSent(function (GetSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/custom-session';
        });
    });
});

describe(description: 'get authenticated account info', tests: function () {
    it(description: 'can get authenticated account info', closure: function () {
        MockClient::global(mockData: [
            GetMeRequest::class => MockResponse::make(body: ['id' => '123456789@c.us', 'name' => 'John'], status: 201)
        ]);

        $result = Session::me();

        expect(value: $result->status())->toBe(expected: 201)
            ->and(value: $result->json(key: 'id'))->toBe(expected: '123456789@c.us');

        MockClient::global()->assertSent(function (GetMeRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/default/me';
        });
    });

    it(description: 'can return SessionMeData DTO', closure: function () {
        $body = [
            'id'       => '123456789@c.us',
            'pushName' => 'John',
        ];

        MockClient::global(mockData: [
            GetMeRequest::class => MockResponse::make(body: $body, status: 201),
        ]);

        $me = Session::me()->dtoOrFail();

        expect(value: $me)->toBeInstanceOf(class: SessionMeData::class);
    });

    it(description: 'can get authenticated account info for explicit session', closure: function () {
        MockClient::global(mockData: [
            GetMeRequest::class => MockResponse::make(body: ['id' => '123456789@c.us', 'name' => 'John'], status: 201)
        ]);

        $result = Session::me(session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (GetMeRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/custom-session/me';
        });
    });
});

describe(description: 'start session', tests: function () {
    it(description: 'can start session', closure: function () {
        MockClient::global(mockData: [
            StartSessionRequest::class => MockResponse::make(body: ['name' => 'default', 'status' => 'STARTING'], status: 201)
        ]);

        $result = Session::start();

        expect(value: $result->status())->toBe(expected: 201)
            ->and(value: $result->json(key: 'name'))->toBe(expected: 'default');

        MockClient::global()->assertSent(function (StartSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/default/start';
        });
    });

    it(description: 'can start session with explicit session name', closure: function () {
        MockClient::global(mockData: [
            StartSessionRequest::class => MockResponse::make(body: ['name' => 'custom-session', 'status' => 'STARTING'], status: 201)
        ]);

        $result = Session::start(session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 201)
            ->and(value: $result->json(key: 'name'))->toBe(expected: 'custom-session');

        MockClient::global()->assertSent(function (StartSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/custom-session/start';
        });
    });

    it(description: 'uses default session from config when session name is not provided', closure: function () {
        config()->set(key: 'waha.session', value: 'test-session');

        MockClient::global(mockData: [
            StartSessionRequest::class => MockResponse::make(body: ['name' => 'test-session', 'status' => 'STARTING'], status: 201)
        ]);

        $result = Session::start();

        expect(value: $result->status())->toBe(expected: 201)
            ->and(value: $result->json(key: 'name'))->toBe(expected: 'test-session');

        MockClient::global()->assertSent(function (StartSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/test-session/start';
        });
    });
});

describe(description: 'logout session', tests: function () {
    it(description: 'can logout session', closure: function () {
        MockClient::global(mockData: [
            LogoutSessionRequest::class => MockResponse::make(body: ['status' => 'OK'], status: 201)
        ]);

        $result = Session::logout();

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (LogoutSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/default/logout';
        });
    });

    it(description: 'can logout explicit session', closure: function () {
        MockClient::global(mockData: [
            LogoutSessionRequest::class => MockResponse::make(body: ['status' => 'OK'], status: 201)
        ]);

        $result = Session::logout(session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (LogoutSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/custom-session/logout';
        });
    });
});

describe(description: 'restart session', tests: function () {
    it(description: 'can restart session', closure: function () {
        MockClient::global(mockData: [
            RestartSessionRequest::class => MockResponse::make(body: ['status' => 'OK'], status: 201)
        ]);

        $result = Session::restart();

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (RestartSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/default/restart';
        });
    });

    it(description: 'can restart explicit session', closure: function () {
        MockClient::global(mockData: [
            RestartSessionRequest::class => MockResponse::make(body: ['status' => 'OK'], status: 201)
        ]);

        $result = Session::restart(session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (RestartSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/custom-session/restart';
        });
    });
});

describe(description: 'stop session', tests: function () {
    it(description: 'can stop session', closure: function () {
        MockClient::global(mockData: [
            StopSessionRequest::class => MockResponse::make(body: ['status' => 'OK'], status: 201)
        ]);

        $result = Session::stop();

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (StopSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/default/stop';
        });
    });

    it(description: 'can stop explicit session', closure: function () {
        MockClient::global(mockData: [
            StopSessionRequest::class => MockResponse::make(body: ['status' => 'OK'], status: 201)
        ]);

        $result = Session::stop(session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (StopSessionRequest $request): bool {
            return $request->resolveEndpoint() === '/api/sessions/custom-session/stop';
        });
    });
});

describe(description: 'screenshot session', tests: function () {
    it(description: 'can get session screenshot', closure: function () {
        $body = [
            'mimetype' => 'image/png',
            'data'     => 'base64-encoded-data',
        ];

        MockClient::global(mockData: [
            ScreenshotRequest::class => MockResponse::make(body: $body, status: 201)
        ]);

        $result = Session::screenshot();

        expect(value: $result->status())->toBe(expected: 201)
            ->and(value: $result->json())->toBe(expected: $body);

        MockClient::global()->assertSent(function (ScreenshotRequest $request): bool {
            return $request->resolveEndpoint() === '/api/screenshot'
                && $request->query()->all() === ['session' => 'default'];
        });
    });

    it(description: 'can return ScreenshotData DTO', closure: function () {
        $body = [
            'mimetype' => 'image/png',
            'data'     => 'base64-encoded-data',
        ];

        MockClient::global(mockData: [
            ScreenshotRequest::class => MockResponse::make(body: $body, status: 201),
        ]);

        $screenshot = Session::screenshot()->dtoOrFail();

        expect(value: $screenshot)->toBeInstanceOf(class: ScreenshotData::class)
            ->and(value: $screenshot->mimetype)->toBe(expected: 'image/png')
            ->and(value: $screenshot->data)->toBe(expected: 'base64-encoded-data');
    });

    it(description: 'can get session screenshot for explicit session', closure: function () {
        MockClient::global(mockData: [
            ScreenshotRequest::class => MockResponse::make(body: ['mimetype' => 'image/png', 'data' => 'data'], status: 201)
        ]);

        $result = Session::screenshot(session: 'custom-session');

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (ScreenshotRequest $request): bool {
            return $request->query()->all() === ['session' => 'custom-session'];
        });
    });
});

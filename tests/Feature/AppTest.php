<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\AppData;
use NjoguAmos\Waha\Facades\App;
use NjoguAmos\Waha\Enums\AppType;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Requests\App\ListAppsRequest;
use NjoguAmos\Waha\Requests\App\CreateAppRequest;
use NjoguAmos\Waha\Requests\App\DeleteAppRequest;
use NjoguAmos\Waha\Requests\App\UpdateAppRequest;

describe(description: 'list apps', tests: function () {
    it(description: 'can list apps for a session', closure: function () {
        MockClient::global(mockData: [
            ListAppsRequest::class => MockResponse::make(body: [['id' => 'app_123', 'session' => 'default']], status: 200)
        ]);

        $result = App::all();

        expect(value: $result->status())->toBe(expected: 200)
            ->and(value: $result->json())->toBe(expected: [['id' => 'app_123', 'session' => 'default']]);

        MockClient::global()->assertSent(function (ListAppsRequest $request): bool {
            return $request->query()->all() === ['session' => 'default'];
        });
    });

    it(description: 'can list apps for explicit session', closure: function () {
        MockClient::global(mockData: [
            ListAppsRequest::class => MockResponse::make(body: [], status: 200)
        ]);

        App::all(session: 'custom-session');

        MockClient::global()->assertSent(function (ListAppsRequest $request): bool {
            return $request->query()->all() === ['session' => 'custom-session'];
        });
    });
});

describe(description: 'create app', tests: function () {
    it(description: 'can create an app', closure: function () {
        MockClient::global(mockData: [
            CreateAppRequest::class => MockResponse::make(body: ['id' => 'app_123'], status: 201)
        ]);

        $data = new AppData(
            session: 'default',
            app: AppType::CHATWOOT,
            config: ['url' => 'https://example.com']
        );
        $result = App::create(data: $data);

        expect(value: $result->status())->toBe(expected: 201);

        MockClient::global()->assertSent(function (CreateAppRequest $request): bool {
            return $request->body()->all() === [
                'session' => 'default',
                'app'     => 'chatwoot',
                'enabled' => true,
                'config'  => ['url' => 'https://example.com'],
            ];
        });
    });
});

describe(description: 'update app', tests: function () {
    it(description: 'can update an app', closure: function () {
        MockClient::global(mockData: [
            UpdateAppRequest::class => MockResponse::make(body: ['id' => 'app_123'], status: 200)
        ]);

        $data = new AppData(
            session: 'default',
            app: AppType::CHATWOOT,
            enabled: false,
            config: ['url' => 'https://new.example.com']
        );
        $result = App::update(id: 'app_123', data: $data);

        expect(value: $result->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (UpdateAppRequest $request): bool {
            return $request->resolveEndpoint() === '/api/apps/app_123'
                && $request->body()->all() === [
                    'session' => 'default',
                    'app'     => 'chatwoot',
                    'enabled' => false,
                    'config'  => ['url' => 'https://new.example.com'],
                ];
        });
    });
});

describe(description: 'delete app', tests: function () {
    it(description: 'can delete an app', closure: function () {
        MockClient::global(mockData: [
            DeleteAppRequest::class => MockResponse::make(status: 200)
        ]);

        $result = App::delete(id: 'app_123');

        expect(value: $result->status())->toBe(expected: 200);

        MockClient::global()->assertSent(function (DeleteAppRequest $request): bool {
            return $request->resolveEndpoint() === '/api/apps/app_123';
        });
    });
});

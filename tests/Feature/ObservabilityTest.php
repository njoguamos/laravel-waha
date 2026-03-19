<?php

declare(strict_types=1);

use NjoguAmos\Waha\Enums\Engine;
use NjoguAmos\Waha\Enums\Version;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Dto\PingResponseData;
use NjoguAmos\Waha\Dto\ServerVersionData;
use NjoguAmos\Waha\Facades\Observability;
use NjoguAmos\Waha\Requests\Observability\PingRequest;
use NjoguAmos\Waha\Requests\Observability\GetServerVersionRequest;
use NjoguAmos\Waha\Requests\Observability\GetServerEnvVariablesRequest;
use Saloon\Http\PendingRequest;

it(description: 'can ping the server', closure: function () {
    MockClient::global(mockData: [
        PingRequest::class => MockResponse::make(body: ['message' => 'pong'], status: 200)
    ]);

    $result = Observability::ping()->dtoOrFail();

    expect(value: $result)->toBeInstanceOf(class: PingResponseData::class)
        ->and(value: $result->message)->toBe(expected: 'pong');
});

it(description: 'can get the server version', closure: function () {
    MockClient::global(mockData: [
        GetServerVersionRequest::class => MockResponse::make(body: [
            'version' => '2024.2.3',
            'engine'  => 'NOWEB',
            'tier'    => 'PLUS',
            'browser' => '/usr/bin/google-chrome-stable',
        ], status: 200)
    ]);

    $result = Observability::version()->dtoOrFail();

    expect(value: $result)->toBeInstanceOf(class: ServerVersionData::class)
        ->and(value: $result->version)->toBe(expected: '2024.2.3')
        ->and(value: $result->engine)->toBe(expected: Engine::NOWEB)
        ->and(value: $result->tier)->toBe(expected: Version::PRO)
        ->and(value: $result->browser)->toBe(expected: '/usr/bin/google-chrome-stable');
});

it(description: 'can get server environment variables', closure: function (bool $all) {
    MockClient::global(mockData: [
        GetServerEnvVariablesRequest::class => function (PendingRequest $request) use ($all) {
            expect(value: $request->query()->all())->toBe(expected: ['all' => $all ? 'true' : 'false']);

            return MockResponse::make(body: [
                'DEBUG'               => '1',
                'WAHA_HTTP_LOG_LEVEL' => 'debug',
            ], status: 200);
        }
    ]);

    $response = Observability::environment(all: $all);

    expect(value: $response->status())->toBe(expected: 200)
        ->and(value: $response->json())->toBe(expected: [
            'DEBUG'               => '1',
            'WAHA_HTTP_LOG_LEVEL' => 'debug',
        ]);
})->with([true, false]);

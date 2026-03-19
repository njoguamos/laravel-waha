<?php

declare(strict_types=1);

use Carbon\CarbonImmutable;
use Saloon\Http\PendingRequest;
use NjoguAmos\Waha\Enums\Engine;
use NjoguAmos\Waha\Enums\Version;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Dto\PingResponseData;
use NjoguAmos\Waha\Dto\ServerStatusData;
use NjoguAmos\Waha\Dto\ServerVersionData;
use NjoguAmos\Waha\Facades\Observability;
use NjoguAmos\Waha\Requests\Observability\PingRequest;
use NjoguAmos\Waha\Requests\Observability\RestartServerRequest;
use NjoguAmos\Waha\Requests\Observability\GetServerStatusRequest;
use NjoguAmos\Waha\Requests\Observability\GetServerVersionRequest;
use NjoguAmos\Waha\Requests\Observability\GetServerEnvVariablesRequest;

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

it(description: 'can get the server status', closure: function () {
    $startTimestamp = 1723788847247;
    $uptime = 3600000;

    MockClient::global(mockData: [
        GetServerStatusRequest::class => MockResponse::make(body: [
            'startTimestamp' => $startTimestamp,
            'uptime'         => $uptime,
        ], status: 200)
    ]);

    $result = Observability::status()->dtoOrFail();

    expect(value: $result)->toBeInstanceOf(class: ServerStatusData::class)
        ->and(value: $result->startTimestamp)->toBeInstanceOf(class: CarbonImmutable::class)
        ->and(value: $result->startTimestamp->getPreciseTimestamp(3))->toBe(expected: (float) $startTimestamp)
        ->and(value: $result->uptime)->toBe(expected: $uptime);
});

it(description: 'can restart the server', closure: function (bool $force) {
    MockClient::global(mockData: [
        RestartServerRequest::class => function (PendingRequest $request) use ($force) {
            expect(value: $request->body()->all())->toBe(expected: ['force' => $force]);

            return MockResponse::make(status: 200);
        }
    ]);

    $response = Observability::stop(force: $force);

    expect(value: $response->status())->toBe(expected: 200);
})->with([true, false]);

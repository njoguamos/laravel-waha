<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use NjoguAmos\Waha\Dto\PingResponseData;
use NjoguAmos\Waha\Facades\Observability;
use NjoguAmos\Waha\Requests\Observability\PingRequest;

it(description: 'can ping the server', closure: function () {
    MockClient::global(mockData: [
        PingRequest::class => MockResponse::make(body: ['message' => 'pong'], status: 200)
    ]);

    $result = Observability::ping()->dtoOrFail();

    expect(value: $result)->toBeInstanceOf(class: PingResponseData::class)
        ->and(value: $result->message)->toBe(expected: 'pong');
});

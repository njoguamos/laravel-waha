<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\PingResponseData;

it(description: 'can be instantiated with default message', closure: function () {
    $data = new PingResponseData();

    expect($data->message)->toBe('pong');
});

it(description: 'can be instantiated with custom message', closure: function () {
    $data = new PingResponseData(message: 'hello');

    expect($data->message)->toBe('hello');
});

it(description: 'can be converted to an array', closure: function () {
    $data = new PingResponseData(message: 'pong');

    expect($data->toArray())->toBe(['message' => 'pong']);
});

<?php

declare(strict_types=1);

use NjoguAmos\Waha\WahaConnector;
use Saloon\Http\Auth\HeaderAuthenticator;

it(description: 'has correct base url', closure: function () {
    $connector = new WahaConnector(
        baseUrl: 'https://waha.example.com',
        apiKey: 'your-api-key'
    );

    expect(value: $connector->resolveBaseUrl())->toBe(expected: 'https://waha.example.com');
});

it(description: 'has correct default headers', closure: function () {
    $connector = new WahaConnector(
        baseUrl: 'https://waha.example.com',
        apiKey: 'your-api-key'
    );

    $headers = $connector->config()->all();

    expect(value: $connector->headers()->all())->toMatchArray([
        'Content-Type' => 'application/json',
        'Accept'       => 'application/json',
    ]);
});

it(description: 'has correct default authentication', closure: function () {
    $connector = new WahaConnector(
        baseUrl: 'https://waha.example.com',
        apiKey: 'secret-api-key'
    );

    $auth = $connector->getAuthenticator();

    expect(value: $auth)->toBeInstanceOf(class: HeaderAuthenticator::class);

    $reflection = new ReflectionClass(objectOrClass: $auth);
    $accessToken = $reflection->getProperty(name: 'accessToken');
    $headerName = $reflection->getProperty(name: 'headerName');

    expect(value: $accessToken->getValue(object: $auth))->toBe(expected: 'secret-api-key')
        ->and(value: $headerName->getValue(object: $auth))->toBe(expected: 'X-API-Key');
});

it(description: 'has AlwaysThrowOnErrors trait', closure: function () {
    $connector = new WahaConnector(
        baseUrl: 'https://waha.example.com',
        apiKey: 'your-api-key'
    );

    $traits = class_uses($connector);

    expect(value: $traits)->toContain(needle: 'Saloon\Traits\Plugins\AlwaysThrowOnErrors');
});

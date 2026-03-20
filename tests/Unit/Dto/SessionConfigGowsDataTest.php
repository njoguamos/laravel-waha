<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SessionConfigGowsData;

test('session config gows data can be created from array', function () {
    $data = SessionConfigGowsData::fromArray([
        'storage' => [
            'messages' => true,
            'groups'   => false,
            'chats'    => true,
            'labels'   => false,
        ],
    ]);

    expect($data->messages)->toBeTrue()
        ->and($data->groups)->toBeFalse()
        ->and($data->chats)->toBeTrue()
        ->and($data->labels)->toBeFalse();
});

test('session config gows data defaults to true when missing from array', function () {
    $data = SessionConfigGowsData::fromArray([
        'storage' => [],
    ]);

    expect($data->messages)->toBeTrue()
        ->and($data->groups)->toBeTrue()
        ->and($data->chats)->toBeTrue()
        ->and($data->labels)->toBeTrue();
});

test('session config gows data to array', function () {
    $data = new SessionConfigGowsData(
        messages: true,
        groups: false,
        chats: true,
        labels: false,
    );

    expect($data->toArray())->toBe([
        'storage' => [
            'messages' => true,
            'groups'   => false,
            'chats'    => true,
            'labels'   => false,
        ],
    ]);
});

test('session config gows data to array with defaults', function () {
    $data = new SessionConfigGowsData();

    expect($data->toArray())->toBe([
        'storage' => [
            'messages' => true,
            'groups'   => true,
            'chats'    => true,
            'labels'   => true,
        ],
    ]);
});

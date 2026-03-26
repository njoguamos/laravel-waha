<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\PresenceChatData;

test('presence chat data can be created from array', function () {
    $data = PresenceChatData::fromArray([
        'participant'       => '1234567890@c.us',
        'lastKnownPresence' => 'online',
        'lastSeen'          => null,
    ]);

    expect($data->participant)->toBe('1234567890@c.us')
        ->and($data->lastKnownPresence)->toBe('online')
        ->and($data->lastSeen)->toBeNull();
});

test('presence chat data can be created from array with last seen', function () {
    $data = PresenceChatData::fromArray([
        'participant'       => '1234567890@c.us',
        'lastKnownPresence' => 'offline',
        'lastSeen'          => 1686719326,
    ]);

    expect($data->participant)->toBe('1234567890@c.us')
        ->and($data->lastKnownPresence)->toBe('offline')
        ->and($data->lastSeen)->toBe(1686719326);
});

test('presence chat data to array', function () {
    $data = new PresenceChatData(
        participant: '1234567890@c.us',
        lastKnownPresence: 'online',
        lastSeen: null,
    );

    expect($data->toArray())->toBe([
        'participant'       => '1234567890@c.us',
        'lastKnownPresence' => 'online',
        'lastSeen'          => null,
    ]);
});

test('presence chat data to array with last seen', function () {
    $data = new PresenceChatData(
        participant: '1234567890@c.us',
        lastKnownPresence: 'offline',
        lastSeen: 1686719326,
    );

    expect($data->toArray())->toBe([
        'participant'       => '1234567890@c.us',
        'lastKnownPresence' => 'offline',
        'lastSeen'          => 1686719326,
    ]);
});

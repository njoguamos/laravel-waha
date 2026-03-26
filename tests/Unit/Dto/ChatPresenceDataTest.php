<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\ChatPresenceData;
use NjoguAmos\Waha\Dto\PresenceChatData;

test('chat presence data can be created from array', function () {
    $data = ChatPresenceData::fromArray([
        'id'        => '1234567890@c.us',
        'presences' => [
            [
                'participant'       => '1234567890@c.us',
                'lastKnownPresence' => 'online',
                'lastSeen'          => null,
            ],
        ],
    ]);

    expect($data->id)->toBe('1234567890@c.us')
        ->and($data->presences)->toHaveCount(1)
        ->and($data->presences[0])->toBeInstanceOf(PresenceChatData::class)
        ->and($data->presences[0]->participant)->toBe('1234567890@c.us')
        ->and($data->presences[0]->lastKnownPresence)->toBe('online');
});

test('chat presence data can be created from array with multiple presences', function () {
    $data = ChatPresenceData::fromArray([
        'id'        => '111111111111111@g.us',
        'presences' => [
            [
                'participant'       => '111111111111111@g.us',
                'lastKnownPresence' => 'online',
                'lastSeen'          => null,
            ],
            [
                'participant'       => '2132132130@c.us',
                'lastKnownPresence' => 'offline',
                'lastSeen'          => 1686719326,
            ],
        ],
    ]);

    expect($data->id)->toBe('111111111111111@g.us')
        ->and($data->presences)->toHaveCount(2)
        ->and($data->presences[0]->lastKnownPresence)->toBe('online')
        ->and($data->presences[1]->lastKnownPresence)->toBe('offline');
});

test('chat presence data to array', function () {
    $data = new ChatPresenceData(
        id: '1234567890@c.us',
        presences: [
            new PresenceChatData(
                participant: '1234567890@c.us',
                lastKnownPresence: 'offline',
                lastSeen: 1686719326,
            ),
        ],
    );

    expect($data->toArray())->toBe([
        'id'        => '1234567890@c.us',
        'presences' => [
            [
                'participant'       => '1234567890@c.us',
                'lastKnownPresence' => 'offline',
                'lastSeen'          => 1686719326,
            ],
        ],
    ]);
});

test('chat presence data from array with empty presences', function () {
    $data = ChatPresenceData::fromArray([
        'id'        => '1234567890@c.us',
        'presences' => [],
    ]);

    expect($data->id)->toBe('1234567890@c.us')
        ->and($data->presences)->toBeEmpty();
});

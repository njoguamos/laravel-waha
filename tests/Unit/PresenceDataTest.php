<?php

declare(strict_types=1);

use NjoguAmos\Waha\Enums\Presence;
use NjoguAmos\Waha\Dto\PresenceData;

it('can be created with online status and no chatId', function () {
    $dto = new PresenceData(
        presence: Presence::ONLINE,
    );

    expect($dto->presence)->toBe(Presence::ONLINE)
        ->and($dto->chatId)->toBeNull()
        ->and($dto->toArray())->toBe(['presence' => 'online']);
});

it('can be created with offline status and no chatId', function () {
    $dto = new PresenceData(
        presence: Presence::OFFLINE,
    );

    expect($dto->presence)->toBe(Presence::OFFLINE)
        ->and($dto->chatId)->toBeNull()
        ->and($dto->toArray())->toBe(['presence' => 'offline']);
});

it('can be created with typing status and chatId', function () {
    $dto = new PresenceData(
        presence: Presence::TYPING,
        chatId: '1234567890@c.us'
    );

    expect($dto->presence)->toBe(Presence::TYPING)
        ->and($dto->chatId)->toBe('1234567890@c.us')
        ->and($dto->toArray())->toBe([
            'presence' => 'typing',
            'chatId'   => '1234567890@c.us',
        ]);
});

it('throws an exception when typing status is missing chatId', function () {
    new PresenceData(
        presence: Presence::TYPING,
    );
})->throws(InvalidArgumentException::class, 'The chatId is required when presence is set to typing.');

it('throws an exception when recording status is missing chatId', function () {
    new PresenceData(
        presence: Presence::RECORDING,
    );
})->throws(InvalidArgumentException::class, 'The chatId is required when presence is set to recording.');

it('throws an exception when paused status is missing chatId', function () {
    new PresenceData(
        presence: Presence::PAUSED,
    );
})->throws(InvalidArgumentException::class, 'The chatId is required when presence is set to paused.');

<?php

declare(strict_types=1);

use NjoguAmos\Waha\Enums\Presence;
use NjoguAmos\Waha\Dto\PresenceData;

test('presence data to array contains presence', function () {
    $data = new PresenceData(
        presence: Presence::ONLINE,
    );

    expect($data->toArray())->toBe([
        'presence' => 'online',
    ]);
});

test('presence data to array contains optional chatId', function () {
    $data = new PresenceData(
        presence: Presence::TYPING,
        chatId: '1234567890@c.us',
    );

    expect($data->toArray())->toBe([
        'presence' => 'typing',
        'chatId'   => '1234567890@c.us',
    ]);
});

test('presence data throws exception when chatId is missing for typing', function () {
    new PresenceData(
        presence: Presence::TYPING,
    );
})->throws(InvalidArgumentException::class, 'The chatId is required when presence is set to typing.');

test('presence data throws exception when chatId is missing for recording', function () {
    new PresenceData(
        presence: Presence::RECORDING,
    );
})->throws(InvalidArgumentException::class, 'The chatId is required when presence is set to recording.');

test('presence data throws exception when chatId is missing for paused', function () {
    new PresenceData(
        presence: Presence::PAUSED,
    );
})->throws(InvalidArgumentException::class, 'The chatId is required when presence is set to paused.');

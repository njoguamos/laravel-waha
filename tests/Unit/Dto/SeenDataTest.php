<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\SeenData;
use NjoguAmos\Waha\Enums\Engine;

it(description: 'includes messageIds regardless of engine', closure: function (Engine $engine) {
    config(['waha.engine' => $engine]);

    $data = new SeenData(
        chatId: '123456789@c.us',
        messageIds: ['id1', 'id2']
    );

    expect($data->toArray())->toBe([
        'chatId'     => '123456789@c.us',
        'messageIds' => ['id1', 'id2'],
    ]);
})->with(Engine::cases());

it(description: 'includes participant when provided', closure: function () {
    $data = new SeenData(
        chatId: '123456789@c.us',
        participant: '987654321@c.us'
    );

    expect($data->toArray())->toBe([
        'chatId'      => '123456789@c.us',
        'participant' => '987654321@c.us',
    ]);
});

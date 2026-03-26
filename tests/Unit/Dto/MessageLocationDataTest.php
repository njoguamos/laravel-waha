<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\MessageLocationData;

it(description: 'can be converted to an array', closure: function () {
    $dto = new MessageLocationData(
        chatId: '123456789@c.us',
        latitude: 38.8937255,
        longitude: -77.0969763,
        title: 'Our office',
        reply_to: 'false_1111@c.us_AAA',
    );

    $array = $dto->toArray();

    expect($array)->toBe([
        'chatId'    => '123456789@c.us',
        'latitude'  => 38.8937255,
        'longitude' => -77.0969763,
        'title'     => 'Our office',
        'reply_to'  => 'false_1111@c.us_AAA',
    ]);
});

it(description: 'omits reply_to when null', closure: function () {
    $dto = new MessageLocationData(
        chatId: '123456789@c.us',
        latitude: 38.8937255,
        longitude: -77.0969763,
        title: 'Our office',
    );

    $array = $dto->toArray();

    expect($array)->toBe([
        'chatId'    => '123456789@c.us',
        'latitude'  => 38.8937255,
        'longitude' => -77.0969763,
        'title'     => 'Our office',
    ]);
});

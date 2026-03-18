<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\MessageTextData;

it(description: 'can be converted to an array', closure: function () {
    $dto = new MessageTextData(
        chatId: '123456789@c.us',
        text: 'Hello World',
        reply_to: 'false_1111@c.us_AAA',
        mentions: ['123456789@c.us'],
        linkPreview: false,
        linkPreviewHighQuality: false,
    );

    $array = $dto->toArray();

    expect($array)->toBe([
        'chatId'                 => '123456789@c.us',
        'text'                   => 'Hello World',
        'linkPreview'            => false,
        'linkPreviewHighQuality' => false,
        'reply_to'               => 'false_1111@c.us_AAA',
        'mentions'               => ['123456789@c.us'],
    ]);
});

it(description: 'uses default values for link preview fields', closure: function () {
    $dto = new MessageTextData(
        chatId: '123456789@c.us',
        text: 'Hello World',
    );

    $array = $dto->toArray();

    expect($array)->toBe([
        'chatId'                 => '123456789@c.us',
        'text'                   => 'Hello World',
        'linkPreview'            => true,
        'linkPreviewHighQuality' => true,
    ]);
});

<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\MessageImageData;

it(description: 'can be converted to an array', closure: function () {
    $dto = new MessageImageData(
        chatId: '123456789@c.us',
        file: ['url' => 'https://example.com/image.jpg'],
        caption: 'Check this image',
        reply_to: 'false_1111@c.us_AAA',
    );

    $array = $dto->toArray();

    expect($array)->toBe([
        'chatId'   => '123456789@c.us',
        'file'     => ['url' => 'https://example.com/image.jpg'],
        'reply_to' => 'false_1111@c.us_AAA',
        'caption'  => 'Check this image',
    ]);
});

it(description: 'omits optional fields when null', closure: function () {
    $dto = new MessageImageData(
        chatId: '123456789@c.us',
        file: ['url' => 'https://example.com/image.jpg'],
    );

    $array = $dto->toArray();

    expect($array)->toBe([
        'chatId' => '123456789@c.us',
        'file'   => ['url' => 'https://example.com/image.jpg'],
    ]);
});

<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\MessageVideoData;

it(description: 'can be converted to an array', closure: function () {
    $dto = new MessageVideoData(
        chatId: '123456789@c.us',
        file: ['url' => 'https://example.com/video.mp4'],
        reply_to: 'false_1111@c.us_AAA',
        caption: 'Watch this!',
        asNote: true,
    );

    $array = $dto->toArray();

    expect($array)->toBe([
        'chatId'   => '123456789@c.us',
        'file'     => ['url' => 'https://example.com/video.mp4'],
        'convert'  => false,
        'reply_to' => 'false_1111@c.us_AAA',
        'caption'  => 'Watch this!',
        'asNote'   => true,
    ]);
});

it(description: 'can enable convert option', closure: function () {
    $dto = new MessageVideoData(
        chatId: '123456789@c.us',
        file: ['url' => 'https://example.com/video.mp4'],
        convert: true,
    );

    $array = $dto->toArray();

    expect($array['convert'])->toBeTrue();
});

<?php

declare(strict_types=1);

use NjoguAmos\Waha\Enums\FileType;
use NjoguAmos\Waha\Dto\MessageFileData;

it(description: 'can be converted to an array with URL and automatic mimetype/filename', closure: function () {
    $dto = new MessageFileData(
        chatId: '123456789@c.us',
        file: 'https://example.com/document.pdf',
        caption: 'Important document',
        reply_to: 'false_1111@c.us_AAA',
    );

    $array = $dto->toArray();

    expect($array)->toBe([
        'chatId' => '123456789@c.us',
        'file'   => [
            'mimetype' => 'application/pdf',
            'filename' => 'document.pdf',
            'url'      => 'https://example.com/document.pdf',
        ],
        'reply_to' => 'false_1111@c.us_AAA',
        'caption'  => 'Important document',
    ]);
});

it(description: 'can handle manual mimetype and filename', closure: function () {
    $dto = new MessageFileData(
        chatId: '123456789@c.us',
        file: 'https://example.com/some-random-url',
        filename: 'custom-name.zip',
        mimetype: FileType::ZIP,
    );

    $array = $dto->toArray();

    expect($array)->toBe([
        'chatId' => '123456789@c.us',
        'file'   => [
            'mimetype' => 'application/zip',
            'filename' => 'custom-name.zip',
            'url'      => 'https://example.com/some-random-url',
        ],
    ]);
});

it(description: 'can handle base64 data with data URI', closure: function () {
    $base64 = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8z8BQDwAEhQGAhKmMIQAAAABJRU5ErkJggg==';
    $dto = new MessageFileData(
        chatId: '123456789@c.us',
        file: $base64,
        filename: 'image.png',
    );

    $array = $dto->toArray();

    expect($array['file']['mimetype'])->toBe('image/png');
    expect($array['file']['data'])->toBe($base64);
    expect($array['file'])->not->toHaveKey('url');
});

it(description: 'omits optional fields when null', closure: function () {
    $dto = new MessageFileData(
        chatId: '123456789@c.us',
        file: 'https://example.com/document.pdf',
    );

    $array = $dto->toArray();

    expect($array)->toBe([
        'chatId' => '123456789@c.us',
        'file'   => [
            'mimetype' => 'application/pdf',
            'filename' => 'document.pdf',
            'url'      => 'https://example.com/document.pdf',
        ],
    ]);
});

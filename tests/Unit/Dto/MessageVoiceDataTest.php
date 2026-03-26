<?php

declare(strict_types=1);

use NjoguAmos\Waha\Enums\FileType;
use NjoguAmos\Waha\Dto\MessageVoiceData;

it(description: 'can be converted to an array', closure: function () {
    $dto = new MessageVoiceData(
        chatId: '123456789@c.us',
        file: 'https://example.com/voice.opus',
        reply_to: 'false_1111@c.us_AAA',
    );

    $array = $dto->toArray();

    expect($array)->toBe([
        'chatId' => '123456789@c.us',
        'file'   => [
            'mimetype' => 'audio/opus',
            'filename' => 'voice.opus',
            'url'      => 'https://example.com/voice.opus',
        ],
        'convert'  => false,
        'reply_to' => 'false_1111@c.us_AAA',
    ]);
});

it(description: 'can enable convert option', closure: function () {
    $dto = new MessageVoiceData(
        chatId: '123456789@c.us',
        file: 'https://example.com/voice.opus',
        convert: true,
    );

    $array = $dto->toArray();

    expect($array['convert'])->toBeTrue();
});

it(description: 'can detect mimetype from base64 data uri', closure: function () {
    $base64 = 'data:audio/ogg;base64,T0dnUwACAAAAAAAAAAA+';
    $dto = new MessageVoiceData(
        chatId: '123456789@c.us',
        file: $base64,
    );

    $array = $dto->toArray();

    expect($array['file']['mimetype'])->toBe('audio/ogg')
        ->and($array['file']['data'])->toBe($base64);
});

it(description: 'can use custom mimetype and filename', closure: function () {
    $dto = new MessageVoiceData(
        chatId: '123456789@c.us',
        file: 'https://example.com/voice.mp3',
        filename: 'custom.ogg',
        mimetype: FileType::OGG,
        convert: true,
    );

    $array = $dto->toArray();

    expect($array['file']['mimetype'])->toBe('audio/ogg')
        ->and($array['file']['filename'])->toBe('custom.ogg')
        ->and($array['convert'])->toBeTrue();
});

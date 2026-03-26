<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\PollData;
use NjoguAmos\Waha\Dto\MessagePollData;

it(description: 'can be converted to an array', closure: function () {
    $dto = new MessagePollData(
        chatId: '123456789@c.us',
        poll: new PollData(
            name: 'How are you?',
            options: ['Awesome!', 'Good!', 'Not bad!'],
            multipleAnswers: false,
        ),
        reply_to: 'false_1111@c.us_AAA',
    );

    $array = $dto->toArray();

    expect($array)->toBe([
        'chatId' => '123456789@c.us',
        'poll'   => [
            'name'            => 'How are you?',
            'options'         => ['Awesome!', 'Good!', 'Not bad!'],
            'multipleAnswers' => false,
        ],
        'reply_to' => 'false_1111@c.us_AAA',
    ]);
});

it(description: 'omits reply_to when null', closure: function () {
    $dto = new MessagePollData(
        chatId: '123456789@c.us',
        poll: new PollData(
            name: 'How are you?',
            options: ['Awesome!', 'Good!', 'Not bad!'],
        ),
    );

    $array = $dto->toArray();

    expect($array)->toBe([
        'chatId' => '123456789@c.us',
        'poll'   => [
            'name'            => 'How are you?',
            'options'         => ['Awesome!', 'Good!', 'Not bad!'],
            'multipleAnswers' => false,
        ],
    ]);
});

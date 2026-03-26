<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\MessagePollVoteData;

it(description: 'can be converted to an array', closure: function () {
    $dto = new MessagePollVoteData(
        chatId: '123456789@c.us',
        pollMessageId: 'false_123456789@c.us_AAAAAAAAAAAAAAAAAAAA',
        votes: [['Awesome!']],
        pollServerId: 42,
    );

    $array = $dto->toArray();

    expect($array)->toBe([
        'chatId'        => '123456789@c.us',
        'pollMessageId' => 'false_123456789@c.us_AAAAAAAAAAAAAAAAAAAA',
        'votes'         => [['Awesome!']],
        'pollServerId'  => 42,
    ]);
});

it(description: 'omits pollServerId when null', closure: function () {
    $dto = new MessagePollVoteData(
        chatId: '123456789@c.us',
        pollMessageId: 'false_123456789@c.us_AAAAAAAAAAAAAAAAAAAA',
        votes: [['Awesome!']],
    );

    $array = $dto->toArray();

    expect($array)->toBe([
        'chatId'        => '123456789@c.us',
        'pollMessageId' => 'false_123456789@c.us_AAAAAAAAAAAAAAAAAAAA',
        'votes'         => [['Awesome!']],
    ]);
});

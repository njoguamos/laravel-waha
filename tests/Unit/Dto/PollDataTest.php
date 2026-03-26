<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\PollData;

it(description: 'can be converted to an array', closure: function () {
    $dto = new PollData(
        name: 'How are you?',
        options: ['Awesome!', 'Good!', 'Not bad!'],
        multipleAnswers: false,
    );

    $array = $dto->toArray();

    expect($array)->toBe([
        'name'            => 'How are you?',
        'options'         => ['Awesome!', 'Good!', 'Not bad!'],
        'multipleAnswers' => false,
    ]);
});

it(description: 'defaults multipleAnswers to false', closure: function () {
    $dto = new PollData(
        name: 'Favorite color?',
        options: ['Red', 'Blue', 'Green'],
    );

    $array = $dto->toArray();

    expect($array['multipleAnswers'])->toBe(false);
});

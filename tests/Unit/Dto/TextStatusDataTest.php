<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\TextStatusData;

it(description: 'generates a random background color when null', closure: function () {
    $data = new TextStatusData(
        text: 'Hello'
    );

    expect($data->backgroundColor)->not->toBeNull()
        ->and($data->backgroundColor)->toMatch('/^#[0-9a-fA-F]{6}$/');
});

it(description: 'preserves provided background color', closure: function () {
    $data = new TextStatusData(
        text: 'Hello',
        backgroundColor: '#123456'
    );

    expect($data->backgroundColor)->toBe('#123456');
});

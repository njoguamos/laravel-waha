<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\ScreenshotData;

test('screenshot data can be created from array', function () {
    $data = ScreenshotData::fromArray([
        'mimetype' => 'image/png',
        'data'     => 'base64encodeddata',
    ]);

    expect($data->mimetype)->toBe('image/png')
        ->and($data->data)->toBe('base64encodeddata');
});

test('screenshot data to array', function () {
    $data = new ScreenshotData(
        mimetype: 'image/png',
        data: 'base64encodeddata',
    );

    expect($data->toArray())->toBe([
        'mimetype' => 'image/png',
        'data'     => 'base64encodeddata',
    ]);
});

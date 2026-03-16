<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Tests\Unit\Dto;

use InvalidArgumentException;
use NjoguAmos\Waha\Dto\ImageStatusData;

it(description: 'can identify image mime type from URL extension', closure: function () {
    $data = new ImageStatusData(
        file: 'https://example.com/image.jpg'
    );

    expect($data->toArray()['file']['mimetype'])->toBe('image/jpeg');
});

it(description: 'can identify image mime type from data URI', closure: function () {
    $data = new ImageStatusData(
        file: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8z8BQDwAEhQGAhKmMIQAAAABJRU5ErkJggg=='
    );

    expect($data->toArray()['file']['mimetype'])->toBe('image/png');
});

it(description: 'throws exception for non-image files', closure: function () {
    new ImageStatusData(
        file: 'https://example.com/document.pdf'
    );
})->throws(InvalidArgumentException::class, 'The file must be an image.');

it(description: 'includes caption in the array if provided', closure: function () {
    $data = new ImageStatusData(
        file: 'https://example.com/image.png',
        caption: 'Beautiful sunset'
    );

    expect($data->toArray())->toHaveKey('caption', 'Beautiful sunset');
});

it(description: 'uses url key for URLs and data key for base64', closure: function () {
    $urlData = new ImageStatusData(file: 'https://example.com/image.png');
    expect($urlData->toArray()['file'])->toHaveKey('url', 'https://example.com/image.png');
    expect($urlData->toArray()['file'])->not->toHaveKey('data');

    $base64Data = new ImageStatusData(file: 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8z8BQDwAEhQGAhKmMIQAAAABJRU5ErkJggg==');
    expect($base64Data->toArray()['file'])->toHaveKey('data', 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8z8BQDwAEhQGAhKmMIQAAAABJRU5ErkJggg==');
    expect($base64Data->toArray()['file'])->not->toHaveKey('url');
});

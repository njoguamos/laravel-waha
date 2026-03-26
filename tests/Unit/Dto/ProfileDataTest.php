<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\ProfileData;

it(description: 'can create profile data from array', closure: function () {
    $data = ProfileData::fromArray([
        'id'      => '11111111111@c.us',
        'name'    => 'My Name',
        'picture' => 'https://pps.whatsapp.net/v/t/123.jpg',
    ]);

    expect($data->id)->toBe('11111111111@c.us')
        ->and($data->name)->toBe('My Name')
        ->and($data->picture)->toBe('https://pps.whatsapp.net/v/t/123.jpg');
});

it(description: 'can create profile data with null picture', closure: function () {
    $data = ProfileData::fromArray([
        'id'      => '11111111111@c.us',
        'name'    => 'My Name',
        'picture' => null,
    ]);

    expect($data->picture)->toBeNull();
});

it(description: 'can create profile data without picture key', closure: function () {
    $data = ProfileData::fromArray([
        'id'   => '11111111111@c.us',
        'name' => 'My Name',
    ]);

    expect($data->picture)->toBeNull();
});

it(description: 'can convert profile data to array', closure: function () {
    $data = new ProfileData(
        id:      '11111111111@c.us',
        name:    'My Name',
        picture: 'https://pps.whatsapp.net/v/t/123.jpg',
    );

    expect($data->toArray())->toBe([
        'id'      => '11111111111@c.us',
        'name'    => 'My Name',
        'picture' => 'https://pps.whatsapp.net/v/t/123.jpg',
    ]);
});

it(description: 'can convert profile data with null picture to array', closure: function () {
    $data = new ProfileData(
        id:   '11111111111@c.us',
        name: 'My Name',
    );

    expect($data->toArray())->toBe([
        'id'      => '11111111111@c.us',
        'name'    => 'My Name',
        'picture' => null,
    ]);
});

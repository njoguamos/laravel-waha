<?php

declare(strict_types=1);

use NjoguAmos\Waha\Dto\ContactData;

test('contact data can be created from array with all fields', function () {
    $data = ContactData::fromArray([
        'id'          => '11231231231@c.us',
        'number'      => '11231231231',
        'name'        => 'Contact Name',
        'pushname'    => 'Pushname',
        'shortName'   => 'Shortname',
        'isMe'        => true,
        'isGroup'     => false,
        'isWAContact' => true,
        'isMyContact' => true,
        'isBlocked'   => false,
    ]);

    expect($data->id)->toBe('11231231231@c.us')
        ->and($data->number)->toBe('11231231231')
        ->and($data->name)->toBe('Contact Name')
        ->and($data->pushname)->toBe('Pushname')
        ->and($data->shortName)->toBe('Shortname')
        ->and($data->isMe)->toBeTrue()
        ->and($data->isGroup)->toBeFalse()
        ->and($data->isWAContact)->toBeTrue()
        ->and($data->isMyContact)->toBeTrue()
        ->and($data->isBlocked)->toBeFalse();
});

test('contact data can be created from array with partial fields', function () {
    $data = ContactData::fromArray([
        'id'     => '11231231231@c.us',
        'number' => '11231231231',
    ]);

    expect($data->id)->toBe('11231231231@c.us')
        ->and($data->number)->toBe('11231231231')
        ->and($data->name)->toBeNull()
        ->and($data->pushname)->toBeNull()
        ->and($data->shortName)->toBeNull()
        ->and($data->isMe)->toBeNull()
        ->and($data->isGroup)->toBeNull()
        ->and($data->isWAContact)->toBeNull()
        ->and($data->isMyContact)->toBeNull()
        ->and($data->isBlocked)->toBeNull();
});

test('contact data to array with all fields', function () {
    $data = new ContactData(
        id:          '11231231231@c.us',
        number:      '11231231231',
        name:        'Contact Name',
        pushname:    'Pushname',
        shortName:   'Shortname',
        isMe:        true,
        isGroup:     false,
        isWAContact: true,
        isMyContact: true,
        isBlocked:   false,
    );

    expect($data->toArray())->toBe([
        'id'          => '11231231231@c.us',
        'number'      => '11231231231',
        'name'        => 'Contact Name',
        'pushname'    => 'Pushname',
        'shortName'   => 'Shortname',
        'isMe'        => true,
        'isGroup'     => false,
        'isWAContact' => true,
        'isMyContact' => true,
        'isBlocked'   => false,
    ]);
});

test('contact data to array with null fields', function () {
    $data = new ContactData(
        id:          '11231231231@c.us',
        number:      null,
        name:        null,
        pushname:    null,
        shortName:   null,
        isMe:        null,
        isGroup:     null,
        isWAContact: null,
        isMyContact: null,
        isBlocked:   null,
    );

    expect($data->toArray())->toBe([
        'id'          => '11231231231@c.us',
        'number'      => null,
        'name'        => null,
        'pushname'    => null,
        'shortName'   => null,
        'isMe'        => null,
        'isGroup'     => null,
        'isWAContact' => null,
        'isMyContact' => null,
        'isBlocked'   => null,
    ]);
});

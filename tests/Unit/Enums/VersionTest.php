<?php

declare(strict_types=1);

use NjoguAmos\Waha\Enums\Version;

it(description: 'has expected cases', closure: function () {
    expect(value: Version::cases())->toHaveCount(count: 2)
        ->and(value: Version::CORE->value)->toBe(expected: 'CORE')
        ->and(value: Version::PRO->value)->toBe(expected: 'PLUS');
});

it(description: 'returns correct labels', closure: function () {
    expect(value: Version::CORE->label())->toBe(expected: 'Core')
        ->and(value: Version::PRO->label())->toBe(expected: 'Pro');
});

it(description: 'returns correct descriptions', closure: function () {
    expect(value: Version::CORE->description())->toBe(expected: 'Free version of WAHA with basic features.')
        ->and(value: Version::PRO->description())->toBe(expected: 'Plus or pro version of WAHA with advanced features.');
});

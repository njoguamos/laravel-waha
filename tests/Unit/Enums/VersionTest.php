<?php

declare(strict_types=1);

use NjoguAmos\Waha\Enums\Version;

it(description: 'has expected cases', closure: function () {
    expect(Version::cases())->toHaveCount(2)
        ->and(Version::CORE->value)->toBe('core')
        ->and(Version::PRO->value)->toBe('pro');
});

it(description: 'returns correct labels', closure: function () {
    expect(Version::CORE->label())->toBe('Core')
        ->and(Version::PRO->label())->toBe('Pro');
});

it(description: 'returns correct descriptions', closure: function () {
    expect(Version::CORE->description())->toBe('Free version of WAHA with basic features.')
        ->and(Version::PRO->description())->toBe('Plus or pro version of WAHA with advanced features.');
});

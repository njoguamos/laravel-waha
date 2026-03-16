<?php

declare(strict_types=1);

use NjoguAmos\Waha\Enums\Engine;
use NjoguAmos\Waha\Enums\Version;

it(description: 'normalizes and validates WAHA_VERSION environment variable', closure: function () {
    // Helper function to reload config
    $refreshConfig = function () {
        $config = require __DIR__ . '/../../config/waha.php';
        config()->set(key: 'waha', value: $config);
    };

    // Test lowercase 'core'
    putenv(assignment: 'WAHA_VERSION=core');
    $refreshConfig();
    expect(value: config(key: 'waha.version'))->toBe(expected: Version::CORE);

    // Test uppercase 'CORE'
    putenv(assignment: 'WAHA_VERSION=CORE');
    $refreshConfig();
    expect(value: config(key: 'waha.version'))->toBe(expected: Version::CORE);

    // Test invalid value - should default to PRO
    putenv(assignment: 'WAHA_VERSION=invalid');
    $refreshConfig();
    expect(value: config(key: 'waha.version'))->toBe(expected: Version::PRO);

    // Cleanup
    putenv(assignment: 'WAHA_VERSION');
});

it(description: 'normalizes and validates WAHA_ENGINE environment variable', closure: function () {
    // Helper function to reload config
    $refreshConfig = function () {
        $config = require __DIR__ . '/../../config/waha.php';
        config()->set(key: 'waha', value: $config);
    };

    // Test uppercase 'WEBJS'
    putenv(assignment: 'WAHA_ENGINE=WEBJS');
    $refreshConfig();
    expect(value: config(key: 'waha.engine'))->toBe(expected: Engine::WEBJS);

    // Test lowercase 'webjs'
    putenv(assignment: 'WAHA_ENGINE=webjs');
    $refreshConfig();
    expect(value: config(key: 'waha.engine'))->toBe(expected: Engine::WEBJS);

    // Test invalid value - should default to WEBJS
    putenv(assignment: 'WAHA_ENGINE=invalid');
    $refreshConfig();
    expect(value: config(key: 'waha.engine'))->toBe(expected: Engine::WEBJS);

    // Cleanup
    putenv(assignment: 'WAHA_ENGINE');
});

<?php

declare(strict_types=1);

use NjoguAmos\Waha\Enums\Engine;
use NjoguAmos\Waha\Enums\Version;

it(description: 'normalizes and validates WAHA_VERSION environment variable', closure: function () {
    $originalVersion = getenv(name: 'WAHA_VERSION');

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
    if ($originalVersion === false) {
        putenv(assignment: 'WAHA_VERSION');
    } else {
        putenv(assignment: "WAHA_VERSION={$originalVersion}");
    }
});

it(description: 'normalizes and validates WAHA_ENGINE environment variable', closure: function () {
    $originalEngine = getenv(name: 'WAHA_ENGINE');

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
    if ($originalEngine === false) {
        putenv(assignment: 'WAHA_ENGINE');
    } else {
        putenv(assignment: "WAHA_ENGINE={$originalEngine}");
    }
});

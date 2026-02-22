<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            \NjoguAmos\Waha\WahaServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('waha.base_url', 'https://waha.devlike.pro/api');
        $app['config']->set('waha.api_key', 'test-api-key');
        $app['config']->set('waha.session', 'default');
    }
}

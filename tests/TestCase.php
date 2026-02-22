<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /** @return array<int, class-string> */
    protected function getPackageProviders($app)
    {
        return [
            \NjoguAmos\Waha\WahaServiceProvider::class
        ];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        $app['config']->set('waha.base_url', 'https://waha.devlike.pro/api');
        $app['config']->set('waha.api_key', 'test-api-key');
    }
}

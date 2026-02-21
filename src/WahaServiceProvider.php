<?php

declare(strict_types=1);

namespace NjoguAmos\Waha;

use Illuminate\Support\ServiceProvider;

class WahaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            abstract: WahaConnector::class,
            concrete: function (): WahaConnector {
                return new WahaConnector(
                    baseUrl: config()->string(key: 'waha.base_url'),
                    apiKey: config()->string(key: 'waha.api_key'),
                    customHeaders: config()->array(key: 'waha.custom_headers')
                );
            }
        );
    }

    public function boot(): void
    {
        $this->mergeConfigFrom(path: __DIR__ . '/../config/waha.php', key: 'waha');

        $this->publishes(paths: [
            __DIR__ . '/../config/waha.php' => config_path('waha.php'),
        ], groups: 'config');
    }
}

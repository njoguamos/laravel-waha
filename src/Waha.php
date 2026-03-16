<?php

declare(strict_types=1);

namespace NjoguAmos\Waha;

abstract class Waha
{
    protected WahaConnector $connector;

    protected string $session;

    public function __construct()
    {
        $this->connector = app(abstract: WahaConnector::class);

        $this->session = config(key: 'waha.session', default: 'default');
    }
}

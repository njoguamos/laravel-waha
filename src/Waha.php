<?php

declare(strict_types=1);

namespace NjoguAmos\Waha;

abstract class Waha
{
    protected WahaConnector $connector;

    public function __construct()
    {
        $this->connector = app(abstract: WahaConnector::class);
    }
}

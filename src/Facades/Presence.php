<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Facades;

use Illuminate\Support\Facades\Facade;
use NjoguAmos\Waha\Endpoints\Presence as PresenceEndpoint;

class Presence extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return PresenceEndpoint::class;
    }
}

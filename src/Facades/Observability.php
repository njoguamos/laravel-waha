<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Facades;

use Illuminate\Support\Facades\Facade;
use NjoguAmos\Waha\Endpoints\Observability as ObservabilityEndpoint;

/**
 * @method static \Saloon\Http\Response ping()
 * @method static \Saloon\Http\Response version()
 * @method static \Saloon\Http\Response status()
 * @method static \Saloon\Http\Response stop(bool $force = false)
 * @method static \Saloon\Http\Response environment(bool $all = false)
 *
 * @see \NjoguAmos\Waha\Endpoints\Observability
 */
class Observability extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ObservabilityEndpoint::class;
    }
}
